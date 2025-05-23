<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\CooperativeMemberRole;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\LoanRepayment;
use App\Models\LoanSetting;
use App\Models\DueLoans;
use App\Models\LoanPaymentTransaction;
use App\Models\Credit;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Models\Categories;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Models\OgaranyaAPI;
use App\Mail\SendMail;
use App\Mail\OrderApprovedEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;
use App\Mail\CooperativeWelcomeEmail;
use App\Mail\MemberWelcomeEmail;
use App\Models\Settings;
use App\Models\ChooseBank;
use App\Notifications\AdminCancelOrder;
use App\Notifications\NewProduct;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use Validator;
use Session;
use Paystack;
use Storage;
use Mail;
use Notification;
use DateTime;


class MembersController extends Controller
{
       public function __construct()
    {
          $this->middleware(['auth', 'verified']);
            $this->middleware('members');      
    }

    public function index(Request $request){
      if( Auth::user()->role_name  == 'member'){
        $code = Auth::user()->code; 
        $id = Auth::user()->id; //

        $firstTimeLoggedIn = Auth::user()->last_login;
        if (empty($firstTimeLoggedIn)) {
          $data = 
          array( 
            'name'      => Auth::user()->fname,
            'coopname'  => Auth::user()->coopname,
            'email'     => Auth::user()->email,
        );
          Mail::to(Auth::user()->email)->send(new MemberWelcomeEmail($data));  
          $user = Auth::user();
          $user->last_login = Carbon::now();
          $user->save();

        }
        elseif (!empty($firstTimeLoggedIn)) {
           $user = Auth::user();
           $user->last_login = Carbon::now();
           $user->save();
        }
       
        // check if user has field his/her profile
        $user=Auth::user();
        $phone          = $user->phone;
        $bank           = $user->bank;

        if($phone == ''  && $bank =='' ){
            Session::flash('profile', ' You are yet to complete your profile!'); 
            Session::flash('alert-class', 'alert-success'); 
            return Redirect::to('/account-settings');       
        }    
        // sumt credit from a member
        $credit = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')
        ->where('users.id', $id)
        ->get('credit');

        // count orders from a member
        $countOrders = User::join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.status', '!=', 'cancel')
        ->where('users.id', $id);

        $approvedOrders = User::join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.status',  'approved')
        ->where('users.id', $id);
        
        $getCooperativeLogo = User::where('code', Auth::user()->code)
        ->where('coopname', Auth::user()->coopname)
        ->where('role_name', 'cooperative')
        ->get('profile_img');
      
        $wallets = DB::table('wallet_history')->join('users', 'users.id', '=', 'wallet_history.user_id')
        ->select(['wallet_history.*', 'users.fname'])
        ->where('wallet_history.user_id', $id)
        ->orderBy('wallet_history.created_at', 'desc');

        $loan = DB::table('loan')->join('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
         ->select(['loan.*',  'loan_repayment.monthly_due', 'loan_repayment.next_due_date'])
         ->where('loan_repayment.repayment_status', null)
         ->where('loan.member_id', $id);

         $loanPeriod = Loan::join('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
         ->where('loan_repayment.repayment_status', null)
          ->where('loan.member_id', $id)
          ->get('loan.duration')->pluck('duration')->first();

         $dueDtae = Loan::join('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
        ->where('loan_repayment.repayment_status', null)
         ->where('loan.member_id', $id)
         ->get('loan_repayment.next_due_date')->pluck('next_due_date')->first();

         $WalletAccountNumber =  DB::table('wallet')
         ->select(['wallet_account_number'])
         ->where('user_id', $id)
         ->pluck('wallet_account_number')->first();
        
         $WalletAccountName = DB::table('wallet')
         ->select(['fullname'])
         ->where('user_id', $id)
         ->where('cooperative_code', $code)
         ->pluck('fullname')->first(); 

         $WalletBankName = DB::table('wallet')
         ->select(['bank_name'])
         ->where('user_id', $id)
         ->where('cooperative_code', $code)
         ->pluck('bank_name')->first(); 

         $phoneNumber = DB::table('wallet')
         ->select(['phone'])
         ->where('user_id', $id)
         ->pluck('phone')->first();
         
         $lastTenDays = Carbon::now()->subDays(10)->format('Y-m-d');
         $todayDate = Carbon::now()->format('Y-m-d');

        $perPage = $request->perPage ?? 10;
        $search = $request->input('search');
        
        $orders = DB::table('users')
        ->join('orders', 'orders.user_id', '=', 'users.id')
        ->select(['orders.*',  'users.fname', 'users.lname'])
        ->orwhere('users.id',  $id)
        ->orderBy('orders.created_at', 'desc')
        ->where(function ($query) use ($search) {  // <<<
      $query->where('users.fname', 'LIKE', '%'.$search.'%')
          ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.order_number', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.grandtotal', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.date', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.status', 'LIKE', '%'.$search.'%')
          ->orderBy('orders.created_at', 'desc');
        })->paginate($perPage, $columns = ['*'], $pageName = 'orders')
        ->appends(['per_page'   => $perPage]);

         //Ogaranya Wallet Account 
          $data = array(
          "phone"            => $phoneNumber,
          "account_number"   => $WalletAccountNumber,
          );

          $testToken = DB::table('ogaranya_api_token')
          ->select('*')->pluck('test_token')->first();
          $testPublicKey = DB::table('ogaranya_api_token')
          ->select('*')->pluck('test_publickey')->first();
  
          $liveToken = DB::table('ogaranya_api_token')
          ->select('*')->pluck('live_token')->first();
          $livePublicKey = DB::table('ogaranya_api_token')
          ->select('*')->pluck('live_publickey')->first();

          $jsonData = json_encode($data);

          $testURl = "https://api.staging.ogaranya.com/v1/2347033141516/wallet/info";
          $liveURL = 'https://api.ogaranya.com/v1/2347033141516/wallet/info';

           $url = $liveURL ;
          if($jsonData) {
                   $curl = curl_init();
                   curl_setopt_array($curl, array(
                   CURLOPT_URL => $url,
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_CUSTOMREQUEST => 'POST',
                   CURLOPT_POSTFIELDS =>$jsonData,
                   CURLOPT_HTTPHEADER => array(
                     'Content-Type: application/json',
                     'token: '.$liveToken,
                      'publickey:  '.$livePublicKey,
                     )
                   ));
                $res = curl_exec($curl);
                $error = curl_error($curl);
                curl_close($curl);
                $result =  json_decode($res, true);
                //dd($result);
              }
               if($result['status'] == 'success'){
                $accountBalance = $result['data']['available_balance'];      
               }
               if($result['status'] == 'error'){
                return view('members.dashboard',  compact(
                  'perPage', 
                  'credit', 
                  'countOrders',
                  'orders',
                  'approvedOrders',
                  'getCooperativeLogo',
                  'wallets', 
                  'loan',
                  'dueDtae','loanPeriod', 'WalletAccountNumber',
                      'WalletAccountName', 'WalletBankName'));
                 }
                 $walletdData = array(
                  "phone"            => $phoneNumber,
                  "account_number"   => $WalletAccountNumber,
                  "from"             => $lastTenDays,
                  "to"               => $todayDate,
                  );
                  $testToken = DB::table('ogaranya_api_token')
                  ->select('*')->pluck('test_token')->first();
                  $testPublicKey = DB::table('ogaranya_api_token')
                  ->select('*')->pluck('test_publickey')->first();
          
                  $liveToken = DB::table('ogaranya_api_token')
                  ->select('*')->pluck('live_token')->first();
                  $livePublicKey = DB::table('ogaranya_api_token')
                  ->select('*')->pluck('live_publickey')->first();
 
                  $jsonWalletData = json_encode($walletdData);
                 // dd($jsonWalletData);
                 $testURl = "https://api.staging.ogaranya.com/v1/2347033141516/wallet/history";
                 $liveURL = 'https://api.ogaranya.com/v1/2347033141516/wallet/history';

                  $walletHistoryUrl =   $liveURL;
                  if($jsonWalletData) {
                           $curlopt = curl_init();
                           curl_setopt_array($curlopt, array(
                           CURLOPT_URL => $walletHistoryUrl,
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_CUSTOMREQUEST => 'POST',
                           CURLOPT_POSTFIELDS =>$jsonWalletData,
                           CURLOPT_HTTPHEADER => array(
                             'Content-Type: application/json',
                             'token: '.$liveToken,
                             'publickey:  '.$livePublicKey,
                            )
                           ));
                        $response = curl_exec($curlopt);
                        $error = curl_error($curlopt);
                        curl_close($curlopt);
                        $detail =  json_decode($response, true);
                      }
                      if($detail['status'] == 'success'){
                        $arrayWalletTransaction = $detail['data'];
                        $getWalletAmount = Arr::pluck($arrayWalletTransaction, 'amount');
                        $walletAmount = implode(" ",$getWalletAmount);
                        $walletTransaction = $detail['data'];
                      }
                       if($detail['status'] == 'error'){
                        return view('members.dashboard', compact(
                            'perPage', 
                            'credit', 
                            'countOrders',
                            'orders',
                            'approvedOrders',
                            'getCooperativeLogo',
                            'wallets', 
                            'loan',
                            'dueDtae','loanPeriod', 'WalletAccountNumber',
                              'WalletAccountName', 'WalletBankName'));
                      }       
        $pagination = $orders->appends ( array ('search' => $search) );
          if (count ( $pagination ) > 0){
              return view ('members.dashboard' ,  compact(
                  'perPage', 
                  'credit', 
                  'countOrders',
                  'orders',
                  'approvedOrders',
                  'getCooperativeLogo',
                  'wallets', 
                  'loan',
                  'dueDtae','loanPeriod'))->withDetails ( $pagination );     
          } 
          else{
              redirect()->back()->with('status', 'No record found'); 
          }  

        \LogActivity::addToLog('Member dashboard');
        return view('members.dashboard', compact(
        'perPage', 
        'credit', 
        'countOrders', 
        'orders',
        'approvedOrders',
        'getCooperativeLogo',
        'wallets', 'loan',
      'dueDtae','loanPeriod', 'WalletAccountNumber',
      'WalletAccountName', 'WalletBankName', 'accountBalance',  'walletTransaction'));
      }  
      else { return Redirect::to('/login');}
    }


    public function memberOrderHistory(Request $request){
      if( Auth::user()->role_name  == 'member'){
       
        $id = Auth::user()->id; 
        // count orders from a member
        $countOrders = User::join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.status', '!=', 'cancel')
        ->where('users.id', $id);

        $approvedOrders = User::join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.status',  'approved')
        ->where('users.id', $id);

        $perPage = $request->perPage ?? 10;
        $search = $request->input('search');
        
        $orders = DB::table('users')
        ->join('orders', 'orders.user_id', '=', 'users.id')
        ->select(['orders.*',  'users.fname', 'users.lname'])
        ->orwhere('users.id',  $id)
        ->orderBy('orders.created_at', 'desc')
        ->where(function ($query) use ($search) {  // <<<
      $query->where('users.fname', 'LIKE', '%'.$search.'%')
          ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.order_number', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.grandtotal', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.date', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.status', 'LIKE', '%'.$search.'%')
          ->orderBy('orders.created_at', 'desc');
        })->paginate($perPage, $columns = ['*'], $pageName = 'orders')
        ->appends(['per_page'   => $perPage]);

        $pagination = $orders->appends ( array ('search' => $search) );
          if (count ( $pagination ) > 0){
              return view ('members.order-history' ,  compact(
                  'perPage', 
                  'countOrders',
                  'orders',
                  'approvedOrders'))->withDetails ( $pagination );     
          } 
          else{
              redirect()->back()->with('status', 'No record found'); 
          }  

        \LogActivity::addToLog('Member dashboard');
        return view('members.order-history', compact(
        'perPage', 
        'countOrders', 
        'orders',
        'approvedOrders'));
      } 
      else { return Redirect::to('/login');}
    }

    public function member_invoice(Request $request, $order_number ){  
      if( Auth::user()->role_name  == 'member'){
          $id = Auth::user()->id; //
          $item = Order::join('users', 'users.id', '=', 'orders.user_id')// count orders from members
          ->leftjoin('order_items', 'order_items.order_id', '=', 'orders.id')
          ->join('shipping_details', 'shipping_details.shipping_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_items.product_id')
          //->join('vouchers', 'vouchers.user_id', '=', 'users.id')
          ->where('users.id', $id)// also see all orders of members
          ->where('orders.order_number', $order_number)
          ->get([ 'orders.*', 
          'users.*',
          'order_items.*',  
          'products.prod_name', 
          'products.image', 
          'products.description',
          'shipping_details.*'])->first();

          $orders = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
          ->join('products', 'products.id', '=', 'order_items.product_id')
          ->where('orders.order_number', $order_number)
          ->get(['orders.*', 
          'order_items.*',  
          'products.prod_name', 
          'products.image', 
          'products.description']);  
          \LogActivity::addToLog('Invoice');
          return view('invoice', compact('item', 'orders'));
            }
      else { 
          return Redirect::to('/login');
          }
    }

    public function cancelOrderPage($id)
    {
        $order = Order::find($id);
        \LogActivity::addToLog('member cancelOrder');
        return view('members.cancel-new-order', compact('order'));
    }

    public function cancelOrder(Request $request){
         $userId = Auth::user()->id; 
         $status = 'cancel';
        $order_id = $request->order_id;
        Order::where('id', $order_id)
        ->update([
        'status' => $status
        ]); 

        // refund credit, charge #200 when order is cancel
        //$amount  = $request->input('amount');
        //$bal = $amount - 200;
        //DB::table('vouchers')->where('user_id', $userId)->increment('credit',$bal);
        \LogActivity::addToLog('Cancel order');
        return redirect('member-order')->with('success', 'Your order has been canceled successful!');
    }


}//class