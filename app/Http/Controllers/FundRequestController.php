<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundRequest;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Notifications\CooperativeFundRequest;
use App\Notifications\MemberFundRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\Credit;
use App\Mail\RequestFundEmail;
use App\Mail\MemberRequestFundEmail;

use Validator;
use Session;
use Mail;
use Carbon\Carbon;
use Notification;


class FundRequestController extends Controller
{
    //
    public function __construct()
{
    $this->middleware('auth');

}
public function requestFund(Request $request){
    \LogActivity::addToLog('Admin fundRequest');
    return view('cooperative.request_fund');
 }

public function showFundrequest(Request $request){
    $fund =  \DB::table('users')->Join('fund_request', 'fund_request.user_id', '=', 'users.id')
    ->where('fund_request.admin_id', Auth::user()->id)
    ->where('fund_request.status', 'pending')
    ->orderBy('fund_request.created_at', 'desc')
     ->get([
        'fund_request.*', 
        'users.email', 
        'users.fname', 
        'users.lname',
        'users.coopname',
        'users.phone'
    ]);
    \LogActivity::addToLog('Fund Rquest');
    return view('fundrequest', compact('fund'));
}

public function sendFundRequest(Request $request){
    $this->validate($request, [
       'amount' => 'required|string|max:100',
       ]);
   
    $email = Auth::user()->email;
    $cooperative_name = Auth::user()->coopname;
    $cooperative_code = Auth::user()->code;
    $amount = $request->amount;

    $superadmin = User::where('role_name', '=', 'superadmin')->get();
    $get_superadmin_id =Arr::pluck($superadmin, 'id');
    $superadmin_id = implode('', $get_superadmin_id);
    
    $fundRequest = new FundRequest;
    $fundRequest->user_id   = Auth::user()->id;
    $fundRequest->amount    = $request->amount;
    $fundRequest->admin_id  = $superadmin_id;
    $fundRequest->status    = 'pending';
    $fundRequest->save();
    
    if($fundRequest){
        $fund_id =$fundRequest->id;
        $notification = new CooperativeFundRequest($fund_id, $fundRequest->amount);
        Notification::send($superadmin, $notification);

         // Email notification to LascocoMart
        $data = array(
        'cooperative_name'  => $cooperative_name,
        'cooperative_code'  => $cooperative_code,
        'email'             => $email,  
        'amount'            => $amount,       
        );
        Mail::to('info@lascocomart.com')->send(new RequestFundEmail($data)); 
    }
    return redirect()->back()->with('success', 'Fund requested successfully!');
}




public function memberFundWallet(Request $request) {
        $email = Auth::user()->email;
        $cooperative_name = Auth::user()->coopname;
        $cooperative_code = Auth::user()->code;
        $fname = Auth::user()->fname;
        $lname = Auth::user()->lname;
        $amount = $request->amount;
        //get the member cooperative admin email
        $cooperative_email = User::where('code', $cooperative_code)->where('role_name', 'cooperative')->get('email');

       $coop_id = User::where('role_name', '=', 'cooperative') ->where('code', $cooperative_code)->get();
       $get_cooperative_id =Arr::pluck($coop_id, 'id');
       $cooperative_id = implode('', $get_cooperative_id);

        $fundRequest = FundRequest::create([
            'user_id' =>Auth::user()->id,
            'amount'  => $request->amount,
            'receiver_id' => $cooperative_id
        ]);
        $fund_id =$fundRequest->id;
        // User::find(Auth::user()->id)->notify(new CooperativeFundRequest($fundRequest->amount));
        $notification = new MemberFundRequest($fund_id, $fundRequest->amount);
        Notification::send($coop_id, $notification);

        if($fundRequest){
             // send email notification to admin
            $data = array(
            'cooperative_name'   => $cooperative_name,
            'first_name'        => $fname,
            'last_name'         => $lname,
            'email'             => $email,  
            'amount'            => $amount,       
            );
            Mail::to($cooperative_email)->send(new MemberRequestFundEmail($data)); 
        }
        return redirect()->back()->with('success', 'Fund requested successfully!');
    }
   
    
}