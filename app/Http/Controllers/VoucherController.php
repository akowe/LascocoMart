<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\CooperativeFundRequest;
use App\Models\FundRequest;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;

use App\Models\Order;
use App\Models\Credit;
use App\Mail\RequestFundEmail;
use App\Mail\MemberRequestFundEmail;
use Auth;
use Validator;
use Session;
use Mail;
use Carbon\Carbon;

class VoucherController extends Controller
{
    //
       public function __construct()
    {
         $this->middleware('auth');
          //$this->middleware('cooperative');
           // $this->middleware('superadmin');
    }

    public function credit_limit(Request $request)
    { 
        if(null !== $_POST['submit']){
            $sender = Auth::user()->id;
            $user_id  = $request->input('user_id');
            $input  = $request->input('credit');
            $member = User::where('id', $user_id)->first();
             
            $balance = \DB::table('vouchers')->where('user_id', $sender)->first()->credit;
            if($balance > $input){
                // check if user is verified
                $verified = \DB::table('users')->where('id', $user_id)->first()->email_verified_at;
                if($verified){ 
                    //increase member credit limit
                    \DB::table('vouchers')->where('user_id', $user_id)->increment('credit',$input);
                    \DB::table('credit_limits')->insert([
                        'user_id' => $sender,
                        'member_name' => $member->fname .$member->lname,
                        'credit' => $input,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                    Session::flash('credit', ' Fund allocated successfuly!'); 
                    Session::flash('alert-class', 'alert-success'); 
                    //decrease cooperative credit limit
                $check = $balance - $input;
                \DB::table('vouchers')->where('user_id', $sender)->update(['credit'=> $check]);   
         
            }
            else{
                  Session::flash('verified', 'Credit not added. This member has not verified his/her account.'); 
                  Session::flash('alert-class', 'alert-danger'); 
            }
             }else{
                  Session::flash('verified', 'Balance not up to Credit amount.'); 
                  Session::flash('alert-class', 'alert-danger'); 
            }
            
        }
             return redirect()->back();

}
   public function limit(){
     return view('cooperative.credit_limit');
    }

    public function load_wallet(Request $request) {
        //$code = Auth::user()->code;
        $user = Auth::user()->id;
        $amount = $request->amount;
        $credit = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')->first();
                        //->where('users.code', $code)->first();
                        //->paginate( $request->get('per_page', 10));
        if ($request->isMethod('POST')) { 
            $amount = $request->amount; 
            \DB::table('vouchers')->where('user_id', $user)->increment('credit',$amount);
        }
        return view('cooperative.addcredit', compact('user','amount','credit'));
    }
 
    public function withdraw(Request $request) {
        $code = Auth::user()->code;
        $id = Auth::user()->id;
        $amount = $request->input('amount');
        $credit = Wallet::join('users', 'users.id', '=', 'wallets.user_id')
                        ->where('users.id', $id)
                       ->get('credit');
        if ($request->isMethod('POST')) {  $amount = $request->amount; }
        return view('merchants.payout', compact('amount','credit'));
    }

  

}