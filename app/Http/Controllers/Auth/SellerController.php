<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
//use Intervention\Image\Facades\Image as Image;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\LogActivity ;
use Session;


class SellerController extends Controller
{
    //
     use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function registerSeller(Request $request){
        return view('auth.seller-register');
    }

    public function seller_insert(Request $request)
    {
        $request->validate([
            'email'     =>'required|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'fullname'  => 'required|string|max:255', 
            'password'  => 'required|string|min:6|confirmed', 
            'code'      => 'string', 
            'seller'    => 'required|string|max:255', 
            'captcha'   => 'required|captcha',
          ],
          ['captcha.captcha'  =>'Wrong code.'],);
 
           $role = '3';
           $role_name = 'merchant';
           $coopID =rand(100,999);
           $code = 'Lascoco'.$coopID;

            $user = new User();
            $user->role         = $role;
            $user->role_name    = $role_name;
            $user->fname        =$request->fullname;
            $user->code         = $code;
            $user->coopname     = $request->seller;
            $user->email        = $request->email;
            $user->password     = Hash::make($request['password']);
            $user->save();

             if($user){
                $voucherDigit = rand(1000000000,9999999999);
                  $voucher = new Voucher();
                  $voucher->user_id = $user->id;
                  $voucher->voucher = $voucherDigit;
                  $voucher->credit = '0';
                  $voucher->save();
      
                  // $wallet = new Wallet();
                  // $wallet->user_id = $user->id;
                  // $wallet->balance = '0';
                  // $wallet->save();

                //LOG NEW REGISTER SELLER
                $log = new LogActivity();
                $log->subject = 'Signup';
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->ip= $request->ip();
                $log->agent =$request->header('user-agent');
                $log->user_id = $user->id;
                $log->save();
             }
           
            Session::flash('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk'); 
            Session::flash('alert-class', 'alert-success'); 
          //return $user;

          return redirect('/')->with('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk');   
        
         

    }
}
