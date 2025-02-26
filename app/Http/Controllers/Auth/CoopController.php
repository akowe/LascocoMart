<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Role;
use App\Models\CooperativeMemberRole;
use App\Models\LogActivity ;
use App\Hpd\Captcha\helper;
use App\Hpd\Captcha\CaptchaServiceProvider;
use App\Hpd\Captcha\CaptchaController;
use App\Hpd\Captcha\Captcha;
use App\Mail\NewUserEmail;
use App\Mail\SendMail;
use App\Mail\OrderApprovedEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;
use App\Mail\CooperativeWelcomeEmail;
use App\Mail\MemberWelcomeEmail;
use Session;
use Auth;
use Mail; 
use Carbon\Carbon;
use App\Rules\Recaptcha;
use Exception;



class CoopController extends Controller
{
     use RegistersUsers;
     public $app;

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
      //
    }
   
    public function registerCooperative(Request $request){
        return view('auth.cooperative-register');
    }

     public function coop_insert(Request $request){
      try{
            $this->validate($request, [ 
              'email'       =>'required|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
              'fullname'    => 'required|string|max:255',
              'password'    => 'required|string|min:6|confirmed',
              'cooperative' => 'required|string|max:255',
              'address'     => 'required|max:225',
              'cooptype'    => 'required|max:225',
              'file'        => 'required|mimes:jpg,jpeg,png|max:300',
              'captcha'     => 'required',
          ]);
            // dd("You are here :) .");
           $role = '2';
           $role_name = 'cooperative';
           $coopID =rand(100,999);
           $code = 'Lascoco'.$coopID;

           $image= $request->file('file');

           $extension = $request->file('file')->getClientOriginalExtension(); 
            $fileName= $request->file('file')->getClientOriginalName(); 
            $imageName =  rand(1000000000, 9999999999).'.'.$extension;
            $image->move(public_path('assets/cooperativeCert'),$imageName);
            $image_path = "/assets/cooperativeCert/".$imageName; 
           //new User;
            $user = new User();
            $user->role         = $role;
            $user->role_name    = $role_name;
            $user->fname        =$request->fullname;
            $user->code         = $code;
            $user->coopname     = $request->cooperative;
            $user->address      = $request->address;
            $user->cooptype     = $request->cooptype; 
            // $user->payment_days = $request->payment_days; 
            $user->cooperative_cert = $image_path;
            $user->email        = $request->email;
            $user->password     = Hash::make($request['password']);
            $user->save();
            if($user){
              $code =  $user->code ;
              $shareUrl = route('register-member', ['user' => $code, 'reference' => '2/' ]);
                $voucherDigit = rand(1000000000,9999999999);
                  $voucher = new Voucher();
                  $voucher->user_id = $user->id;
                  $voucher->voucher = $voucherDigit;
                  $voucher->credit = '0';
                  $voucher->save();

                  //LOG NEW REGISTER COOPERATIVE
                    $log = new LogActivity();
                    $log->subject = 'Signup';
                    $log->url = $request->fullUrl();
                    $log->method = $request->method();
                    $log->ip= $request->ip();
                    $log->agent =$request->header('user-agent');
                    $log->user_id = $user->id;
                    $log->save();
                    $data = 
                    array(
                      'user_id'   =>  $user->code,
                      'coopname'  =>   $user->coopname,  
                      'email'     =>  $user->email ,
                      'url'       =>  $shareUrl,
                  );
                  Mail::to($user->email)->send(new CooperativeWelcomeEmail($data));  
                  Mail::cc('lascocomart@gmail.com')->send(new NewUserEmail($data));
              }
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
            Session::flash('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk'); 
            Session::flash('alert-class', 'alert-success'); 
          return redirect('/')->with('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk');     
     
    }

    public function registerMember(Request $request){
        return view('auth.member-register');
    }

    public function createMember(Request $request){
      try{
          $coperative = User::where('code',  $request->code)->first();  
          $coopname = $coperative->coopname;
            $role = '4';
            $role_name = 'member';

            $request->validate([
              'email'       =>'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
              'fullname'    => 'required|string|max:255',
              'captcha'     => 'required',]);

            $user = new User();
            $user->role         = $role;
            $user->role_name    = $role_name;
            $user->fname        = $request->fullname;
            $user->code         = $request->code;
            $user->coopname     = $coopname;
            $user->email        = $request->email;
            $user->password     = Hash::make($request['password']);
            $user->save();
            if($user){
              $memberRole = new CooperativeMemberRole;
              $memberRole->member_id          = $user->id;
              $memberRole->cooperative_code   = $request->code;
              $memberRole->member_role        = $role;
              $memberRole->member_role_name  =  $role_name;
              $memberRole->save();

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
                  //LOG NEW REGISTER MEMBER
                  $log = new LogActivity();
                  $log->subject = 'Signup';
                  $log->url = $request->fullUrl();
                  $log->method = $request->method();
                  $log->ip= $request->ip();
                  $log->agent =$request->header('user-agent');
                  $log->user_id = $user->id;
                  $log->save();
              }
            $data = 
            array( 
              'name'      => $user->fname,
              'coopname'  => $user->coopname,
              'email'     => $user->email ,
            );
          Mail::to($user->email)->send(new MemberWelcomeEmail($data));   
          Mail::cc('lascocomart@gmail.com')->send(new NewUserEmail($data));
      
      } catch (Exception $e) {
         
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
            Session::flash('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk'); 
            Session::flash('alert-class', 'alert-success'); 
          return redirect('/')->with('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk');        
    }

    public function adminAddNewMember(Request $request){
      if(Auth::user()->role_name  == 'cooperative'){
          try {
              $code = Auth::user()->code;
              $cooperativeName = Auth::user()->coopname;
              $request->validate([
                  'email'     =>'required|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                  'fullname'  => 'required|max:255', 
                  'phone'     => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
                  'role'      => 'required|string',
              ]);
        
              $role =DB::table('role')
              ->where('role_name', $request->role)
              ->select('*')
              ->pluck('role')->first();

              $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $randomString = '';
              $num = 8;
              for ($a = 0; $a < $num; $a++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
              }
              $password = str_shuffle($randomString);
                $user = new User();
                $user->role         = '4';
                $user->role_name    = 'member';
                $user->fname        = $request->fullname;
                $user->code         = $code;
                $user->coopname     = $cooperativeName;
                $user->phone        = $request->phone;
                $user->email        = $request->email;
                $user->password     = Hash::make($password);
                $user->password_reset_at = Carbon::now();
                $user->save();
                if($user){

                $memberRole = new CooperativeMemberRole;
                $memberRole->member_id          = $user->id;
                $memberRole->cooperative_code   = $code;
                $memberRole->member_role        = $role;
                $memberRole->member_role_name  = $request->role;
                $memberRole->save();

                $rand = rand(1000000000,9999999999);
                $voucher = new Voucher();
                $voucher->user_id = $user->id;
                $voucher->voucher = $rand;
                $voucher->credit = '0';
                $voucher->save();
                  
                //send emailto new user
                $email = $user->email ;
                $data = 
                array(
                  'password'   => $password ,   
                  'email'     => $email,
              );
                //$newEmail = Mail::to($email)->send(new NewUserEmail($data));  
                
                $newEmail =  Mail::to($email)->bcc('lascocomart@gmail.com')->send(new NewUserEmail($data));
                if($newEmail){
                  Session::flash('success', ' New member created successfully. Login details has been sent to user email address. <br> User to check his/her inbox or spam/junk'); 
                  Session::flash('alert-class', 'alert-success'); 
                  return redirect()->back()->with('success', ' New member created successfully.  Login details has been sent to user email address. <br> User to check his/her inbox or spam/junk');         
                }
                else{
                  return redirect()->back()->with('status', ' New member was created. System could not send email');         
                }
              }

            } catch (Exception $e) {
              
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

          return redirect()->back()->with('status', ' New member was created. System could not send email'); 
        }// authenticate
    }

    public function registerCoopMember(Request $request){
      //get params  from  url/route
      $coopCode =$request->input('user');
     // dd($coopCode);
      return view('auth.coop-member-register-url', compact('coopCode'));
  }

  public function createCoopMember(Request $request){
    try{
        $coperative = User::where('code',  $request->user)->first();  
        $coopname = $coperative->coopname;
          $role = '4';
          $role_name = 'member';

          $request->validate([
            'email'       =>'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'fullname'    => 'required|string|max:255',
            'captcha'     => 'required',]);

          $user = new User();
          $user->role         = $role;
          $user->role_name    = $role_name;
          $user->fname        = $request->fullname;
          $user->code         = $request->user;
          $user->coopname     = $coopname;
          $user->email        = $request->email;
          $user->password     = Hash::make($request['password']);
          $user->email_verified_at =  Carbon::now();
          $user->save();
          if($user){
            $memberRole = new CooperativeMemberRole;
            $memberRole->member_id          = $user->id;
            $memberRole->cooperative_code   = $request->code;
            $memberRole->member_role        = $role;
            $memberRole->member_role_name  =  $role_name;
            $memberRole->save();

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
                //LOG NEW REGISTER MEMBER
                $log = new LogActivity();
                $log->subject = 'Signup';
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->ip= $request->ip();
                $log->agent =$request->header('user-agent');
                $log->user_id = $user->id;
                $log->save();
                $data = 
                array( 
                  'name'      => $user->fname,
                  'coopname'  => $user->coopname,
                  'email'     => $user->email,
                );
              Mail::to($user->email)->send(new MemberWelcomeEmail($data));   
              Mail::cc('lascocomart@gmail.com')->send(new MemberWelcomeEmail($data));
          }
        } catch (Exception $e) {
              
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
            Session::flash('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk'); 
            Session::flash('alert-class', 'alert-success'); 
          return redirect('/')->with('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk');            
  }

}//class