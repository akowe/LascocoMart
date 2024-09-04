<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\LoanRepayment;
use App\Models\LoanSetting;
use App\Models\DueLoans;
use App\Models\LoanPaymentTransaction;
use App\Mail\PaymentEmail;
use App\Mail\ConfirmPaymentEmail;
use App\Mail\ConfirmOrderEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;
use App\Notifications\NewCardPayment;
use Notification;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use Validator;
use Session;
use Paystack;
use Mail;

class BankTransferController extends Controller
{
    //
    public function __construct()
    {
         // $this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    public function bankPayment(Request $request){
        session_start();
        $user_id= Auth::user()->id;
        $code = Auth::user()->code;

        $select_bank = \DB::table('banks')->orderBy('name')->get('*');
        $all_orders = User::join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.status', 'approved') 
        ->where('users.code', $code) 
        ->get('orders.*');  

        $orders = User::join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.status', 'approved') 
        ->where('users.code', $code) 
        ->get(['orders.id']);  
       // dd($all_orders);
      
        return view('cooperative.bank-payment', compact('select_bank', 'all_orders', 'orders'));
    }

public function bankTransferPayment(Request $request, $reference, $order_id, $order_amount){
    $ids = $request->order_id;
    $asset_request = Order::whereIn('id', explode(",", $ids))->get();
    $order_id = Arr::pluck($asset_request, 'id');

    foreach($order_id as $item){
        \DB::table('orders')->where('id',$item )->update([
            'status'=> 'paid', 
            'pay_status' =>'success',
            'pay_type' =>'Cooperative',
            'admin_settlement_msg' => 'paid'
        ]);
        $tranx = new Transaction();
        $tranx->user_id     = Auth::user()->id;
        $tranx->paystack_ref= $reference;
        $tranx->order_id    =  $item;
        $tranx->tran_amount = $order_amount;
        $tranx->pay_status  =  'success';
        $tranx->save();

        $getLoanTypeID =  Order::select('loan_type_id')
        ->where('id', $order_id)
        ->where('cooperative_code', Auth::user()->code)->get();
        $loanType =Arr::pluck($getLoanTypeID, 'loan_type_id');
        $loanTypeID = implode(" ",$loanType); 

        $rateType = LoanType:: select('rate_type')
        ->where('id', $loanTypeID)
        ->where('cooperative_code', Auth::user()->code)->get();

        $getDuration = DB::table('orders')
        ->select('duration')
        ->where('id', $order_id)
        ->where('cooperative_code', Auth::user()->code)->get();
        $loandDration =Arr::pluck($getDuration, 'duration');
        $duration = implode(" ",$loandDration); 
      
        $getMemberID = DB::table('orders')
        ->where('id', $order_id)
        ->where('cooperative_code', Auth::user()->code)
        ->get('user_id');
        $adminMember =Arr::pluck($getMemberID, 'user_id');
        $memberID = implode(" ",$adminMember); 

        $getPercentage = LoanType::where('id', $loanTypeID)
        ->where('cooperative_code', Auth::user()->code)->get();
        $loanPercentage =Arr::pluck($getPercentage, 'percentage_rate');
        $percentageRate = implode(" ",$loanPercentage); 
   
        $getTenure = LoanType::where('id', $loanTypeID)
        ->where('cooperative_code', Auth::user()->code)->get();
        $loanTenure =Arr::pluck($getTenure, 'max_duration');
        $maxTenure = implode(" ",$loanTenure); 

        // dd($duration);
        $principal = (int)$order_amount;
        $percentage = $principal / 100 * $percentageRate ;
        $annualInterest = '';
        $monthlyPrincipal = '';
        $monthlyInterest = '';
        $totalMonthlyDue = '';
        if($rateType = 'simple interest')
        {
            $annualInterest = $percentage * $duration;
            $totalDue = $principal + $annualInterest ;
            $monthlyPrincipal = $principal / $duration;
            $monthlyInterest = $annualInterest / $duration;
            $totalMonthlyDue = $monthlyPrincipal + $monthlyInterest ;
        }

        if($rateType = 'flat rate'){
            $annualInterest = $percentage * $maxTenure; 
            $totalDue       = $principal +  $annualInterest;
            $monthlyPrincipal = $principal / $duration;
            $monthlyInterest  = $annualInterest / $duration;
            $totalMonthlyDue  = $monthlyPrincipal + $monthlyInterest ;      
        }
    
        //create loan payout for member
        $cooperativeRepaymentStart = DB::table('loan_settings')
        ->where('cooperative_code', Auth::user()->code)
        ->select('*')
        ->pluck('start_repayment')->first();

        $loanStartRepaymentDay = $cooperativeRepaymentStart * 30;//30 days
        $loanEndPeriod =  $duration * 30; 
        $payOutDate = Carbon::now()->format('Y-m-d');

        $getRepaymentStartDate = Carbon::createFromFormat('Y-m-d', $payOutDate)->addDays($loanStartRepaymentDay);
        $repaymentStartDate =  $getRepaymentStartDate->format('Y-m-d');

        $getRepaymentEndDate =  Carbon::createFromFormat('Y-m-d', $payOutDate)->addDays( $loanEndPeriod);
        $repaymentEndDate   =  $getRepaymentEndDate->format('Y-m-d');

        $startDate  =  $repaymentStartDate;
        $endDate    =  $repaymentEndDate ;
        $loan = new Loan;
        $loan->member_id            = $memberID;
        $loan->cooperative_code     = Auth::user()->code;
        $loan->loan_type_id         = $loanTypeID;
        $loan->principal            = $principal;
        $loan->interest             = $annualInterest;
        $loan->total                = $totalDue;
        $loan->duration             = $duration;
        $loan->loan_balance         = $totalDue;
        $loan->loan_status          = 'payout';
        $loan->start_date           =  $startDate;
        $loan->end_date             =  $endDate;
        $loan->save();
        if($loan){
            $loanRepayment = new LoanRepayment;
            $loanRepayment->loan_id             = $loan->id;
            $loanRepayment->member_id           = $memberID;
            $loanRepayment->cooperative_code    = Auth::user()->code;
            $loanRepayment->loan_type_id        = $loanTypeID;
            $loanRepayment->monthly_principal   = $monthlyPrincipal;
            $loanRepayment->monthly_interest    = $monthlyInterest;
            $loanRepayment->monthly_due         = $totalMonthlyDue;
            $loanRepayment->next_due_date       = $startDate;
            $loanRepayment->save();

            $startPeriod = Carbon::parse($startDate);
            $endPeriod   = Carbon::parse($endDate);
            $period = CarbonPeriod::create($startPeriod, '30 days', $endPeriod);
            $loanDueDates  = [];
                 
            foreach ($period as $date) {
                $loanDueDates[] = $date->format('Y-m-d');
            }
            $monthlyDueDates = json_encode($loanDueDates);
            foreach($loanDueDates as $dueDate){
                $dueLoan = new DueLoans;
                $dueLoan->loan_id           =  $loan->id;
                $dueLoan->member_id         =  $memberID;
                $dueLoan->cooperative_code  =  Auth::user()->code;
                $dueLoan->monthly_due       =  $totalMonthlyDue;
                $dueLoan->due_date          =  $dueDate;
                $dueLoan->payment_status    =  'pending';
                $dueLoan->save();
            }
          
        }

        $order_number = Order::where('id', $order_id)->get('order_number');
        $orderItems = OrderItem::where('order_id', $order_id)->get();
        $seller_id=Arr::pluck($orderItems, 'seller_id');
        $product_id=Arr::pluck($orderItems, 'product_id');

        $getPrice = Product::where('id', $product_id)->get();
        $getSellerPrice = Arr::pluck($getPrice, 'seller_price');
        $sellerPrice = implode('', $getSellerPrice);

        $seller =  User::where('id', $seller_id)
        ->get('id');
        //for every new order decrease product quantity
        $itemQuantity = Arr::pluck($orderItems, 'order_quantity');
        $quantity = implode('', $itemQuantity);
        $stock = \DB::table('products')->where('id', $product_id)->first()->quantity;        
        if($stock > $quantity){
            \DB::table('products')->where('id', $product_id)->decrement('quantity',$quantity);
        }
        $notification = new NewCardPayment($order_number);
        Notification::send($seller, $notification); 
       // Wallet::where('user_id', $seller_id)->increment('credit',$sellerPrice);
    }
    $superadmin = User::where('role_name', '=', 'superadmin')->get();
    $get_superadmin_id =Arr::pluck($superadmin, 'id');
    $superadmin_id = implode('', $get_superadmin_id);
    Notification::send($superadmin, $notification);
    \LogActivity::addToLog('Cooperative Payment for member');

    return redirect('admin-member-order')->with('success', 'Payment successful');
}


}