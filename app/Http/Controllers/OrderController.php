<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Models\Categories;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\LoanRepayment;
use App\Models\LoanSetting;
use App\Models\DueLoans;
use App\Models\LoanPaymentTransaction;
use App\Models\Settings;
use App\Models\ChooseBank;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\fcmgOrder;
use App\Models\fcmgOrderItem;
use App\Models\ShippingDetail;
use App\Mail\ConfirmOrderEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;
use App\Mail\AwaitsApprovalEmail;
use App\Notifications\NewOrder;
use App\Mail\NewUserEmail;
use Notification;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use Session;
use Validator;
use Auth;
use Mail;

class OrderController extends Controller
{
    //
      public function __construct()
    {
         $this->middleware('auth');  
    }

    public function confirm_order(){
      \LogActivity::addToLog('ConfirmOrder');
        return view('order');
        }


    public function order(Request $request){
      try{
        $member= Auth::user()->id;
        $cart = session()->get('cart', []);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        // shuffle pin
        $order_number = str_shuffle($pin);
        $order_status  = 'awaits approval'; 
        $pay_status  = 'pending';
        $ship_address  = $_POST['ship_address'];
        $ship_city     = $_POST['ship_city'];
        $ship_phone    = $_POST['ship_phone'];
        $note          = $_POST['note'];
 
       if(isset($_POST) && count($_POST) > 0) {
            $totalAmount = 0;
              foreach ($cart as $item) {
                  $totalAmount += $item['price'] * $item['quantity'];
              } 
              $grandtotal =  $totalAmount + $request->delivery;
              $order = new Order();
              $order->user_id             = Auth::user()->id;
              $order->cooperative_code    = Auth::user()->code;
              $order->total               = $totalAmount;
              $order->delivery_fee        = $request->delivery;
              $order->grandtotal          = $grandtotal;
              $order->order_number        = $order_number;
              $order->status              = $order_status;
              $order->pay_status          = $pay_status ;
              $order->save(); 

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
                $seller_price = 0;
                $seller_price += $price - $company_percentage;
                $amount = $item['price'] * $item['quantity'];
                $orderItem = new OrderItem();
                $orderItem->order_id   = $order->id;
                $orderItem->product_id = $item['id'];
                $orderItem->seller_id = $item['seller_id'];
                $orderItem->order_quantity   = $item['quantity'];
                $orderItem->unit_cost     = $item['price'];
                $orderItem->amount     = $amount;
                $orderItem->save();
            }
              $shipDetails = new ShippingDetail();
                $shipDetails->shipping_id = $order->id;
                $shipDetails->ship_address = $ship_address;
                $shipDetails->ship_city = $ship_city;
                $shipDetails->ship_phone = $ship_phone;
                $shipDetails->note = $note;
                $shipDetails->save();
          
              $request->session()->forget('cart');
                      
            \LogActivity::addToLog('New Order');  
            return redirect()->back()->with('status', 'Your order has been sent to your cooperative admin for approval');
        }//isset  
      }
        catch (Exception $e) {
          //return redirect('request-product-loan/'.$order->id)->with('order', 'You are requesting a product loan. How long do you want to pay back');
          $message = $e->getMessage();
          //var_dump('Exception Message: '. $message);
    
          $code = $e->getCode();       
          //var_dump('Exception Code: '. $code);
    
          $string = $e->__toString();       
        // var_dump('Exception String: '. $string);
    
        $errorData = 
        array(
          'password'   => $string ,   
          'email'     => $message,
        );
        $emailSuperadmin =  Mail::to('lascocomart@gmail.com')->send(new NewUserEmail($errorData));   
        // exit;
      }
  
  }


public function requestProductLoan(Request $request, $orderId){
    $member= Auth::user()->id;
    $code= Auth::user()->code;
    $chooseLoanType = LoanType::select('name')
    ->where('cooperative_code', $code)
    ->where('name', 'product')->pluck('name')->first();

    $loanTypeID = LoanType::select('id')
    ->where('cooperative_code', $code)
    ->where('name', 'product')->pluck('id')->first();
    
    $loanTypeName = LoanType::select('name')
      ->where('cooperative_code', $code)
      ->where('name', 'product')->pluck('name')->first();

      $getMemberID = Order::where('id', $orderId)->pluck('user_id')->first();
      $getMemberName  = User::where('id', $getMemberID)->pluck('fname')->first();
      $getAdminLoanDuration = LoanSetting::where('cooperative_code', $code)->pluck('max_duration')->first();
      $orderNumber = Order::where('id', $orderId)->pluck('order_number')->first();

    $productLoanInterest = DB::table('loan_settings')
         ->select('percentage_rate')
         ->where('cooperative_code', $code)
         ->pluck('percentage_rate')->first();

    $getOrderTotal = DB::table('orders')->select('grandtotal')
    ->where('id', $orderId)
    ->pluck('grandtotal')->first();

           $principal = '';
           $annualInterest = '';
           $totalDue = '';
           $rateType = '';
           $duration ='';
           $maxTenure = '';
           $percentage = '';
           $getOrderID = $orderId;
          // dd( $getOrderID);

          return view('loan.member.product-loan', compact('chooseLoanType', 'loanTypeID',
        'loanTypeName', 'principal', 'maxTenure', 'percentage', 'annualInterest', 'totalDue',
          'rateType','duration',  'getOrderTotal', 'getOrderID', 'productLoanInterest', 
          'orderId', 'getMemberName', 'getAdminLoanDuration', 'orderNumber'));  
}


public function calculateProductLoanInterest(Request $request, $id, $orderId, $duration){
  if(Auth::user()){
    try{
      $code = Auth::user()->code;
      $chooseLoanType = LoanType::select('*')
      ->where('cooperative_code', $code)->get();
      $loanTypeID = $id;

      $getOrderID = $orderId;

      // $getOrderID = DB::table('orders')->select('id')
      // ->where('grandtotal', $amount)
      // ->pluck('id')->first();
      $getMemberID = Order::where('id', $orderId)->pluck('user_id')->first();
      $getMemberName  = User::where('id', $getMemberID)->pluck('fname')->first();
      $getAdminLoanDuration = LoanSetting::where('cooperative_code', $code)->pluck('max_duration')->first();
      $orderNumber = Order::where('id', $orderId)->pluck('order_number')->first();
      $getOrderTotal = DB::table('orders')->select('grandtotal')
      ->where('id', $orderId)
      ->pluck('grandtotal')->first();

      $getLoanTypeName = LoanType::select('name')
      ->where('id', $id)
      ->where('cooperative_code', $code)->get();
      $findloanTypeName =Arr::pluck($getLoanTypeName, 'name');
      $loanTypeName = implode(" ",$findloanTypeName); 
  
      $loanTypeName = LoanType::select('name')
      ->where('id', $id)
      ->where('cooperative_code', $code)
      ->where('name', 'product')->pluck('name')->first();

      $percentageRate = DB::table('loan_settings')
         ->select('percentage_rate')
         ->where('cooperative_code', $code)
         ->pluck('percentage_rate')->first();

         $maxTenure =  DB::table('loan_settings')
         ->select('max_duration')
         ->where('cooperative_code', $code)
         ->pluck('max_duration')->first();
      
         $rateType = DB::table('loan_settings')
         ->select('rate_type')
         ->where('cooperative_code', $code)
         ->pluck('rate_type')->first();

        $productLoanInterest = DB::table('loan_settings')
         ->select('percentage_rate')
         ->where('cooperative_code', $code)
         ->pluck('percentage_rate')->first();
      

      $principal = (int)$getOrderTotal;
      $percentage = $principal / 100 * $percentageRate ;
      $annualInterest = $percentage * $maxTenure; //for flat rate interest type
      $totalDue = $principal +   $annualInterest;//for flat rate interest type
      
      return view('loan.member.product-loan', compact('chooseLoanType',
      'loanTypeName', 'principal', 'maxTenure', 'percentage', 'annualInterest',
      'totalDue', 'rateType', 'duration', 'loanTypeID', 'getOrderTotal', 
      'getOrderID', 'productLoanInterest', 'getMemberName',  
      'getAdminLoanDuration', 'orderId', 'orderNumber')); 
    }catch (Exception $e) {

          //return redirect('request-product-loan/'.$order->id)->with('order', 'You are requesting a product loan. How long do you want to pay back');
          $message = $e->getMessage();
          //var_dump('Exception Message: '. $message);

          $code = $e->getCode();       
          //var_dump('Exception Code: '. $code);

          $string = $e->__toString();       
          // var_dump('Exception String: '. $string);

          $errorData = 
          array(
          'password'   => $string ,   
          'email'     => $message,
          );
          $emailSuperadmin =  Mail::to('lascocomart@gmail.com')->send(new NewUserEmail($errorData));   
          // exit;
    }
  }
  else{ return Redirect::to('/login');} 
}

public function sendMemberOrderToAdmin(Request $request, $id){
  if(Auth::user()->role_name == 'member'){
    $code = Auth::user()->code;
    $order = Order::find($id);
    $order->status            = 'awaits approval';
    $order->cooperative_code  = $code;
    $order->loan_type_id      = $request->loanTypeID;
    $order->duration          = $request->duration;
    $order->update();

    if($order){
        $superadmin = User::where('role_name', '=', 'superadmin')->get();
          $get_superadmin_id =Arr::pluck($superadmin, 'id');
          $superadmin_id = implode('', $get_superadmin_id);

          $order_number = $order->order_number;
          $grandtotal = $order->grandtotal;
          $notification = new NewOrder($order_number);
          Notification::send($superadmin, $notification);
          
          $name =  \DB::table('users')->where('id', $order->user_id)->get('fname') ; 
          $username = Arr::pluck($name, 'fname'); // 
          $get_name = implode(" ",$username);

          $getCode =  \DB::table('users')->where('id', $order->user_id)->get('code') ; 
          $userCoopcode = Arr::pluck($getCode, 'code'); // 
          $code = implode(" ",$userCoopcode);

          $coopEmail = \DB::table('users')->where('code', $code)->where('role', '2')->get('email') ; 
          $getEmail= Arr::pluck($coopEmail, 'email'); // 
          $adminEmail = implode(" ",$getEmail);

          $coopName = \DB::table('users')->where('code', $code)->where('role', '2')->get('coopname') ; 
          $getCoop= Arr::pluck($coopName, 'coopname'); // 
          $cooperative = implode(" ",$getCoop);

          $coopId = User::where('code', $code)->where('role', '=', '2')->get() ; 
          $getId= Arr::pluck($coopId, 'id'); // 
          $adminId = implode('', $getId);
          
          $notification = new NewOrder($order_number);
          Notification::send($coopId, $notification);
           //send emails
            $data = array(
            'cooperative'   => $cooperative,
            'order_number' => $order_number,  
            'amount'       => $grandtotal, // delivery inclusive
            'name'       => $get_name,       
                );

             Mail::to($adminEmail)->send(new AwaitsApprovalEmail($data)); 
             Mail::to('info@lascocomart.com')->send(new OrderEmail($data)); 
    }

    \LogActivity::addToLog('Member Request Order Approval');
    return redirect('member-order')->with('success',  'Order sent for approval');
  }
  else { return Redirect::to('/login');}  
  }

}//class
