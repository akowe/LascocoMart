<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

use App\Models\User;
use App\Models\Voucher;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Mail\PaymentEmail;
use App\Mail\ConfirmPaymentEmail;
use App\Mail\SalesEmail;

use Auth;
use Validator;
use Session;
use Paystack;
use Mail;


class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
         $user= Auth::user()->id;
         //get cart items
         $cart = session()->get('cart');
         //get others form input
         $ship_address  =  $request->input('ship_address');
         $ship_city     = $request->input('ship_city');
         $ship_phone    = $request->input('ship_phone');
         $note          = $request->input('note');
        $delivery      = $request->delivery;

       if(isset($_POST) && count($_POST) > 0) {
         $amount = 0;
        foreach ($cart as $item) {
            $amount += $item['price'] * $item['quantity'];
        }
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $order_number = str_shuffle($pin);
        $totalAmount = $amount + $delivery;
        
        $order = new Order();
        $order->user_id         = Auth::user()->id;
        $order->total           = $totalAmount;
        $order->order_number    = $order_number;
        $order->delivery_fee    = $delivery;
        $order->status    = 'pending';

        $order->save();
         $data = [];
        foreach ($cart as $item) {
            $data['items'] = [
                [
                    'prod_name' => $item['prod_name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'seller_id'=> $item['seller_id'], 
                    'id'    => $item['id'],
            ]
        ]; 
        $orderItem = new OrderItem();
             $orderItem->order_id       = $order->id;
             $orderItem->product_id     = $item['id'];
             $orderItem->seller_id      = $item['seller_id'];
             $orderItem->order_quantity = $item['quantity'];
             $orderItem->amount         = $item['price'];
             $orderItem->save();
        }
           $shipping = new ShippingDetail();
            $shipping->shipping_id      = $order->id;
            $shipping->ship_phone       = $ship_phone;
            $shipping->ship_address     = $ship_address;
            $shipping->ship_city        = $ship_city;
            $shipping->note             = $note;
            $shipping->save();
        }

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
     //Getting authenticated user 
        $id = Auth::user()->id;

        $paymentDetails = Paystack::getPaymentData(); 
         dd($paymentDetails);
        $status     = $paymentDetails['data']['status']; 
        $amount     = $paymentDetails['data']['amount']; 
        $reference  =  $paymentDetails['data']['reference'];
        //$order_number = $paymentDetails['data']['metadata'];
        // $product_id= $paymentDetails['data']['id'];
        $authorization = array_column($paymentDetails, 'authorization'); 
        $authorization_code = Arr::pluck($authorization, 'authorization_code'); // 
        $get_authCode = implode(" ",$authorization_code);
      
       
        if($status == "success"){ 
        // Storing the Paystack reference
             $tranx = new Transaction();
             $tranx->user_id            = $id;
             $tranx->order_number       = $order_number;
             $tranx->authorization_code = $get_authCode;
             $tranx->paystack_ref       = $reference;
            //  $tranx->tran_amount        = $amount/100;
             $tranx->pay_status         = $status;
             $tranx->save();
        }
        if($tranx){
            //update order status to Paid in orderItem table with new credit balance
            Order::where('order_number', $order_number)
                        ->update([
                        'order_status' => 'Paid',
                        'pay_status'=> $status,
                        'pay_type'=>'Debit Card'
                    ]);
            
            $items = OrderItem::Join('order', 'order.id', '=', 'order_items.order_id')
            ->Join('product', 'product.id', '=', 'order_items.prod_id')
            ->where('order.order_number', $order_number)
            ->get(['order.user_id', 'order.total', 'order.order_number', 'order_items.order_quantity', 'order_items.prod_id', 'order_items.amount', 'product.prod_name']);
            
            $get_total = Arr::pluck($items, 'total');
            $total = implode(" ",$get_total);
    
            $get_prod_name = Arr::pluck($items, 'prod_name');
            $prod_name = implode(" ",$get_prod_name);
    
            $get_order_quantity = Arr::pluck($items, 'order_quantity');
            $order_quantity = implode(" ",$get_order_quantity);
    
            $get_amount = Arr::pluck($items, 'amount');
            $amount = implode(" ",$get_amount);
    
            $get_product_id = Arr::pluck($items, 'prod_id');
            $product_id = implode(" ",$get_product_id);

            $get_order_userid = Arr::pluck($items, 'user_id');
            $order_userid = implode(" ",$get_order_userid);
        
            $get_seller_price = Product::where('id', $product_id)->get('seller_price');
            $seller_price = Arr::pluck($get_seller_price, 'seller_price');
            $selling_price = implode('', $seller_price);

            Wallet::where('user_id', $seller_id)
            ->increment(
            'credit',$selling_price
           );
                
                $data = array(
                    'total'         => $total,
                    'order_number'  => $order_number,  
                    'amount'        => $amount,
                    'prod_name'     =>$prod_name,
                    'order_quantity'=>$order_quantity
                );
    
             //for every new order decrease product quantity
             $stock = \DB::table('products')->where('id', $product_id)->first()->quantity;
             
             if($stock > $order_quantity){
                 \DB::table('products')->where('id', $product_id)->decrement('quantity',$quantity);
                 }
 
            //REMOVE item from cart
            $request->session()->forget('cart');

            $name =  \DB::table('users')->where('id', $order_userid)->get('fname') ; 
            $username = Arr::pluck($name, 'fname'); // 
            $get_name = implode(" ",$username);
 
            $email =  \DB::table('users')->where('id', $order->user_id)->get('email') ; 
            $useremail = Arr::pluck($email, 'email'); // 
            $get_email = implode(" ",$useremail);
 
          // send email notification to member
             $data = array(
             'name'         => $get_name,
             'order_number' => $order_number,  
             'amount'       => $amount,       
                 );
 
             Mail::to($get_email)->send(new ConfirmOrderEmail($data)); 
             Mail::to('info@lascocomart.com')->send(new OrderEmail($data)); 
           
           

     
        }
          return redirect()->route('cart')->with('success', 'Your Payment was successfull');
    }
}//class