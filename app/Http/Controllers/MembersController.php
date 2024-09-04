<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use App\Mail\MemberWelcomeEmail;
use App\Models\Wallet;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\LoanRepayment;
use App\Models\LoanSetting;
use App\Models\DueLoans;
use App\Models\Settings;
use App\Models\ChooseBank;

use Auth;
use Validator;
use Session;
use Mail;


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
         //staging: https://api.staging.ogaranya.com/v1/2347033141516/wallet
         //'token: e4f3f028-c0b4-4c9b-b8ef-8be41a7613f6',
         //'publickey: 62f2da03d13992642d5416b3b1977071bf3adfe99a93b8daea6194306b168b84901f49025f25a245f083b0d627c921f5642ff124047e4a143dfe4cc1dd526d1b',
         
         //production:  https://api.ogaranya.com/v1/2347033141516/wallet
         // 'token: MDY0OTgzMTkxNjIzNGViZDA3YWIxZWMwZTFjYzY2Mzk1OTAwYjYwNTc2ZjY4NzBlOTBlMGQzMjk5YzJlZmUxZA==',
         // 'publickey: 4f223ac9cff724d03833fb8fb9e1a0638dc5125696420cc33c71bcf2e35a0af08beb8cd85a0c0c2eca2670d0244ca70bb9dff6bfa081def75cdaab1034beb1fe',
         $data = array(
          "phone"            => $phoneNumber,
          "account_number"   => $WalletAccountNumber,
          );
          $jsonData = json_encode($data);
           $url = "https://api.staging.ogaranya.com/v1/2347033141516/wallet/info";
          if($jsonData) {
                   $curl = curl_init();
                   curl_setopt_array($curl, array(
                   CURLOPT_URL => $url,
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_CUSTOMREQUEST => 'POST',
                   CURLOPT_POSTFIELDS =>$jsonData,
                   CURLOPT_HTTPHEADER => array(
                     'Content-Type: application/json',
                     'token: e4f3f028-c0b4-4c9b-b8ef-8be41a7613f6',
                      'publickey: 62f2da03d13992642d5416b3b1977071bf3adfe99a93b8daea6194306b168b84901f49025f25a245f083b0d627c921f5642ff124047e4a143dfe4cc1dd526d1b',
        
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

                  $jsonWalletData = json_encode($walletdData);
                 // dd($jsonWalletData);
                  $walletHistoryUrl = "https://api.staging.ogaranya.com/v1/2347033141516/wallet/history";
                  if($jsonWalletData) {
                           $curlopt = curl_init();
                           curl_setopt_array($curlopt, array(
                           CURLOPT_URL => $walletHistoryUrl,
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_CUSTOMREQUEST => 'POST',
                           CURLOPT_POSTFIELDS =>$jsonWalletData,
                           CURLOPT_HTTPHEADER => array(
                             'Content-Type: application/json',
                             'token: e4f3f028-c0b4-4c9b-b8ef-8be41a7613f6',
                              'publickey: 62f2da03d13992642d5416b3b1977071bf3adfe99a93b8daea6194306b168b84901f49025f25a245f083b0d627c921f5642ff124047e4a143dfe4cc1dd526d1b',
                
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