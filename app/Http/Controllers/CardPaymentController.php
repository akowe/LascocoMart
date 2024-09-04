<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Mail\PaymentEmail;
use App\Mail\ConfirmPaymentEmail;
use App\Mail\ConfirmOrderEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;
use App\Notifications\NewCardPayment;
use Notification;


use Auth;
use Validator;
use Session;
use Paystack;
use Mail;


class CardPaymentController extends Controller
{
   public function redirectToGateway(Request $request)
    {
          // check if user has field his/her profile
          $user=Auth::user();
          $address        = $user->address;
          $phone          = $user->phone;
            if($address == ''  && $phone =='' )
            {
              Session::flash('status', ' You are yet to complete your profile!'); 
              Session::flash('alert-class', 'alert-success'); 
              return Redirect::to('/account-settings');     
            }
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    } 
    
     public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();
        //Getting authenticated user 
        $member= Auth::user()->id;
         //get cart items
         $cart = session()->get('cart', []);
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $order_number = str_shuffle($pin);
        $status = "paid";
         //get others form input
        $order_number  = $order_number;
        $order_status  = $status;
        $pay_status = "success";   
        $ship_address  =  $request->input('ship_address');
        $ship_city     = $request->input('ship_city');
        $ship_phone    = $request->input('ship_phone');
        $note          = $request->input('note');
        //$amount = "0"; 
        $payment = json_decode(json_encode($paymentDetails),true);
       //get individual payment data from to store in DB
        $status = $paymentDetails['data']['status'];// get the status of the payment
        $reference = $paymentDetails['data']['reference'];// paystack reference
        //$delivery_fee = $paymentDetails['data']['delivery'];
        $amount = $paymentDetails['data']['amount']; 
        $total = $amount / 100;
        $created_at = $paymentDetails['data']['created_at'];//
        $paid_at = $paymentDetails['data']['paid_at'];//
         $metaData = array_column($paymentDetails, 'metadata');
         $member = Arr::pluck($metaData, 'member_id'); 
         $member_id = $member;
         $user = Arr::pluck($metaData, 'user_id'); 
         $user_id = $user; 
        
         $authorization = array_column($paymentDetails, 'authorization');  
         $authorization_code = Arr::pluck($authorization, 'authorization_code'); // 
         $get_authCode = implode(" ",$authorization_code);
         $reference = Arr::pluck($paymentDetails, 'reference');// paystack reference
         $get_ref = implode(" ",$reference);

         $get_delivery = Arr::pluck($metaData, 'delivery');
         $delivery_fee = implode(" ",$get_delivery);

         $type = Arr::pluck($metaData, 'transaction_type'); 
         $transactionType = implode(" ",$type);
        //Checking to Ensure the transaction was succesful
        if($status == "success"){ 
            $totalAmount = $total - $delivery_fee;
            $order = new Order();
            $order->user_id         = Auth::user()->id;
            $order->total           = $totalAmount;
            $order->delivery_fee    = $delivery_fee; 
            $order->grandtotal      = $amount / 100;
            $order->order_number    = $order_number;
            $order->status          = $order_status;
            $order->pay_status      = $pay_status;
            $order->pay_type        = ' ';
            $order->transaction_type = $transactionType;
            $order->save();

            $shipDetails = new ShippingDetail();
            $shipDetails->shipping_id = $order->id;
            $shipDetails->ship_address = $ship_address;
            $shipDetails->ship_city = $ship_city;
            $shipDetails->ship_phone = $ship_phone;
            $shipDetails->note = $note;
            $shipDetails->save();

           // save Paystack reference
           $tranx = new Transaction();
           $tranx->user_id            = Auth::user()->id;
           $tranx->authorization_code = $get_authCode;
           $tranx->paystack_ref       = $get_ref;
           $tranx->order_id            =  $order->id;
           $tranx->tran_amount         = $amount / 100;
           $tranx->pay_status         =  $pay_status;
           $tranx->save();
           
            if($transactionType == "product"){
                $data = [];

                foreach ($cart as $item) {
                        $data['items'] = [
                        [
                            'prod_name' => $item['prod_name'],
                            'price' => $item['price'],
                            'quantity' => $item['quantity'],
                            'seller_id'=> $item['seller_id'], 
                            $seller_id = $item['seller_id'], 
                            $price = $item['price'],
                            $product_id = $item['id'],
                            $quantity = $item['quantity'],
                            ]
                        ];
                    $company_percentage = 0;
                    $company_percentage +=  $price * 5/ 100;
                    $total_sales = 0;
                    $total_sales += $price - $company_percentage;
    
                    $orderItem = new OrderItem();
                    $orderItem->order_id        = $order->id;
                    $orderItem->product_id      = $item['id'];
                    $orderItem->seller_id       = $item['seller_id'];
                    $orderItem->order_quantity  = $item['quantity'];
                    $orderItem->amount          = $item['price'] * $item['quantity'];
                    $orderItem->unit_cost       = $item['price'];
                    $orderItem->save();
                    
                    $get_seller_price = Product::where('id', $product_id)->get('seller_price');
                    $seller_price = Arr::pluck($get_seller_price, 'seller_price');
                    $selling_price = implode('', $seller_price);
    
                    $seller =  User::where('id', $seller_id)
                    ->get('id');
                      $sellerEmail =  User::where('id', $seller_id)
                    ->get('email');
                    $notification = new NewCardPayment($order_number);
                    Notification::send($seller, $notification); 
        
                    // Wallet::where('user_id', $seller_id)
                    //         ->increment(
                    //         'credit',$selling_price
                    //     );
               
                    //for every new order decrease product quantity
                    $stock = \DB::table('products')->where('id', $product_id)->first()->quantity;
                  
                      if($stock > $quantity){
                          \DB::table('products')->where('id', $product_id)->decrement('quantity',$quantity);
                         }
    
                         $name =  \DB::table('users')->where('id', $order->user_id)->get('fname') ; 
                         $username = Arr::pluck($name, 'fname'); // 
                         $get_name = implode(" ",$username);
              
                          $email =  \DB::table('users')->where('id', $order->user_id)->get('email') ; 
                         $useremail = Arr::pluck($email, 'email'); // 
                         $get_email = implode(" ",$useremail);
              
                       // send email notification to member
                          $data = array(
                          'name'         => $get_name,
                          'order_number' => $order_number,  
                          'amount'       => $totalAmount,       
                              );
               
                          Mail::to($get_email)->send(new ConfirmOrderEmail($data)); 
                            Mail::to($sellerEmail)->send(new SalesEmail($data));
                          Mail::to('info@lascocomart.com')->send(new OrderEmail($data));  
                    }              
            }

            if($transactionType == "fmcg"){
                $data = [];

                foreach ($cart as $item) {
                        $data['items'] = [
                        [
                            'prod_name' => $item['prod_name'],
                            'price' => $item['price'],
                            'quantity' => $item['quantity'],
                            'seller_id'=> $item['seller_id'], 
                            $seller_id = $item['seller_id'], 
                            $price = $item['price'],
                            $product_id = $item['id'],
                            $quantity = $item['quantity'],
                            ]
                        ];
                    $company_percentage = 0;
                    $company_percentage +=  $price * 5/ 100;
                    $total_sales = 0;
                    $total_sales += $price - $company_percentage;
    
                    $orderItem = new OrderItem();
                    $orderItem->order_id        = $order->id;
                    $orderItem->product_id      = $item['id'];
                    $orderItem->seller_id       = $item['seller_id'];
                    $orderItem->order_quantity  = $item['quantity'];
                    $orderItem->amount          = $item['price'] * $item['quantity'];
                    $orderItem->unit_cost       = $item['price'];
                    $orderItem->save();
                    
                    $get_seller_price = FcmgProduct::where('id', $product_id)->get('seller_price');
                    $seller_price = Arr::pluck($get_seller_price, 'seller_price');
                    $selling_price = implode('', $seller_price);
    
                    $seller =  User::where('id', $seller_id)
                    ->get('id');
                      $sellerEmail =  User::where('id', $seller_id)
                    ->get('email');
                    //notify seller
                    $notification = new NewCardPayment($order_number);
                    Notification::send($seller, $notification); 
        
                    // Wallet::where('user_id', $seller_id)
                    //         ->increment(
                    //         'credit',$selling_price
                    //     );
               
                    //for every new order decrease product quantity
                    $stock = \DB::table('fmcg_products')->where('id', $product_id)->first()->quantity;
                  
                      if($stock > $quantity){
                          \DB::table('fmcg_products')->where('id', $product_id)->decrement('quantity',$quantity);
                         }
    
                         $name =  \DB::table('users')->where('id', $order->user_id)->get('fname') ; 
                         $username = Arr::pluck($name, 'fname'); // 
                         $get_name = implode(" ",$username);
              
                          $email =  \DB::table('users')->where('id', $order->user_id)->get('email') ; 
                         $useremail = Arr::pluck($email, 'email'); // 
                         $get_email = implode(" ",$useremail);
              
                       // send email notification to member
                          $data = array(
                          'name'         => $get_name,
                          'order_number' => $order_number,  
                          'amount'       => $totalAmount,       
                              );
               
                          Mail::to($get_email)->send(new ConfirmOrderEmail($data)); 
                            Mail::to($sellerEmail)->send(new SalesEmail($data));
                          Mail::to('info@lascocomart.com')->send(new OrderEmail($data));  
                    }              
            }
                //in-app payment notification
                $superadmin = User::where('role_name', '=', 'superadmin')->get();
                $get_superadmin_id =Arr::pluck($superadmin, 'id');
                $superadmin_id = implode('', $get_superadmin_id);

                $notification = new NewCardPayment($order_number);
                Notification::send($superadmin, $notification);
        
            //remove item from cart
            $request->session()->forget('cart');
            \LogActivity::addToLog('Card Payment');
            return redirect()->route('cart')->with('success', 'Your Order was successfull');
        }
    }
}

?>