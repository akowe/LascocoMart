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
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Gregwar\CaptchaBundle\Type\CaptchaType;
//use Intervention\Image\Facades\Image as Image;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\LogActivity ;
use  App\Rules\Recaptcha;
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
       }


    public function registerSeller(Request $request){
        // Will build phrases of 5 characters, only digits
        $phraseBuilder = new PhraseBuilder(5, '0123456789');
        // Pass it as first argument of CaptchaBuilder, passing it the phrase
        // builder
        $builder = new CaptchaBuilder(null, $phraseBuilder);
       // $builder = new CaptchaBuilder;
        $builder->build();
        $builder->setMaxBehindLines('0');
        $builder->setMaxFrontLines('0');
        Session::put('captcha',$builder->getPhrase());
       
        return view('auth.seller-register', compact('builder'));
    }

    public function seller_insert(Request $request)
    {
        $request->validate([
            'email'     =>'required|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'fullname'  => 'required|string|max:255', 
            'password'  => 'required|string|min:6|confirmed', 
            'code'      => 'string', 
            'seller'    => 'required|string|max:255', 
             'captcha'     => 'required',
        ]);
        $value = $request->session()->get('captcha');
  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //dd(  $value);
            // Checking that the posted phrase match the phrase stored in the session
            if (isset($value) && PhraseBuilder::comparePhrases($value, $_POST['captcha'])) {
               // echo "<h1>Captcha is valid !</h1>";
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
            } else {
               // echo "<h1>Captcha is not valid!</h1>";
                return  redirect()->back()->with('error', 'invalid  captcha');
            }
            // The phrase can't be used twice
            unset($value);
        }
       
    
        }
     
           
           
           

  
}
