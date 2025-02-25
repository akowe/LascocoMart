<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\ChooseBank;
use App\Models\Settings;
use App\Models\LogActivity as LogActivityModel;

use Auth;
use Validator;
use Session;
use Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity(Request $request)
    {
        // $logs = \LogActivity::logActivityLists();
        if(Auth::user()->role_name =='superadmin'){

            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');
          
            $logs = LogActivityModel::join('users', 'users.id', '=', 'log_activity.user_id')
            ->orderBy('log_activity.id', 'desc')
            ->select(['log_activity.*', 'users.email', 'users.fname', 'users.coopname'])
            ->where(function ($query) use ($search) {  // <<<
            $query->where('users.email', 'LIKE', '%'.$search.'%');
            })
            ->paginate($perPage,  $pageName = 'products')->appends(['per_page'   => $perPage]);
            $pagination = $logs->appends ( array ('search' => $search) );
                if (count ( $pagination ) > 0){
                    return view('logActivity',  compact('perPage', 'logs'))->withDetails( $pagination );     
                } 

            return view('logActivity',compact('perPage','logs'));
        }
        else{
            return Redirect::to('/login');
        }
    }

    public function showChangePassword() {
        return view('auth.passwords.change-password');
    }

    public function changePassword(Request $request) {
        if (!(Hash::check($request->get('old-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your old password is incorrect.");
        }

        if(strcmp($request->get('old-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your old password.");
        }

        $validatedData = $request->validate([
            'old-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password   bcrypt();
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->password_reset_at = '';// set to empty.
        $user->save();
        \LogActivity::addToLog('Change password'); 
        return redirect()->back()->with("success","Password successfully changed!");
    } 
    
    //profile seetings view page for all user
    public function settings(Request $request){
        if(Auth::user()){
            $id = Auth::user()->id; 
            $code = Auth::user()->code; 
            $companyName = Auth::user()->coopname;
            $users = User::all()->where('id', $id);
             //  uniqiue  url  for member to register
             $baseURL =   URL::to('');
             $url=  "$baseURL/register-member?refid=$code";
             dd(   $url);

            $selectBankName = ChooseBank::all();
            $appServiceCharge = DB::table('settings')
            ->select('loan_service_charge')
            ->pluck('loan_service_charge')->first();

            $interest = DB::table('loan_settings')
            ->select(['percentage_rate'])
            ->where('user_id', $id)
            ->where('cooperative_code', $code)
            ->pluck('percentage_rate')->first();

            $rateType = DB::table('loan_settings')
            ->select(['rate_type'])
            ->where('user_id', $id)
            ->where('cooperative_code', $code)
            ->pluck('rate_type')->first();

            $minimumDuration = DB::table('loan_settings')
            ->select(['min_duration'])
            ->where('user_id', $id)
            ->where('cooperative_code', $code)
            ->pluck('min_duration')->first();

            $maximumDuration = DB::table('loan_settings')
            ->select(['max_duration'])
            ->where('user_id', $id)
            ->where('cooperative_code', $code)
            ->pluck('max_duration')->first();

            $cooperativeProessFee = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('processing_fee')->first();

            $cooperativeMaxLoan = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('max_loan')->first();

            $cooperativeApprovalLevel = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('approval_level')->first();

            $cooperativeLoanRepayment = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('start_repayment')->first();
            //only   superadmin view this
            $vendorProductPercentage = Settings::where('coopname', 'superadmin')
            ->where('user_id', Auth::user()->id)
            ->pluck('vendor_product_percentage')->first();

            $fmcgProductPercentage = Settings::where('coopname', 'superadmin')
            ->where('user_id', Auth::user()->id)
            ->pluck('fmcg_product_percentage')->first();

          
              if(empty($maximumDuration)){
                Session::flash('profile', ' You are yet to complete your Loan settings!'); 
                Session::flash('alert-class', 'alert-success');   
              }
            
            \LogActivity::addToLog('Profile');
            return view('profile', compact('users', 
            'companyName', 'selectBankName', 'appServiceCharge', 
            'cooperativeProessFee',
            'cooperativeMaxLoan', 'cooperativeApprovalLevel', 
            'cooperativeLoanRepayment', 'interest', 'rateType', 'minimumDuration',
            'maximumDuration', 'vendorProductPercentage', 'fmcgProductPercentage'
            ));
        }
        else{
            return Redirect::to('/login');
        } 
    } 


    public function updateProfile(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id; //
            $this->validate($request, [  
            'address'              => 'required|string|max:255',
            'phone'                => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
            'image'                => 'image|mimes:jpg,png,jpeg|max:300',// maximum is 300kb , 600 x 600 pixel
            ]);
       
             if($request->hasFile('image')) {
               $image= $request->file('image');
               $imageName =  rand(1000000000, 9999999999).'.jpeg';
               $image->move(public_path('images/logo'),$imageName);
               $image_path = "/images/logo/" . $imageName; 
               // Process the new image.
               User::where('id', $user_id)
               ->update([
               'address'      => $request->address,
               'phone'        => $request->phone,
               'profile_img'  => $image_path,   
               'sms'          => $request->sms,       
               ]);

             }
               //update table
               User::where('id', $user_id)
               ->update([
               'address'      => $request->address,
               'phone'        => $request->phone,
               'sms'          => $request->sms,  
               'coopname'    => $request->company_name,
               ]);
               
               $sms =  SMS::where('user_id', $user_id)->get('user_id')->first();
               if (empty($sms)){  
                   $sms =  new SMS;
                   $sms->user_id = Auth::user()->id;
                   $sms->save(); 
               }

             \LogActivity::addToLog('Update');
             return redirect()->back()->with('success', 'Profile saved successful!');
         } 
        else{
         return Redirect::to('/login');
        }
     } 

     public function verifyAccountNumber(Request $request){
        if(Auth::user()){
             $user_id = Auth::user()->id; //
             $this->validate($request, [
             'bankName'       => 'required|string|max:255',
             'accountNumber'  => 'required|string|max:255', 
             'accountName'  => 'required|string|max:255', 
             ]);

             $backName =$request->bankName;
             $bankCode = ChooseBank::select('code')
             ->where('name', $backName)->pluck('code')->first();//remove bracket
            
             $account_number = $request->accountNumber;
            
            }
        }

    // for all user
    public function UpdateBankAccount(Request $request){
        if(Auth::user()){
             $user_id = Auth::user()->id; //
             $this->validate($request, [
             'bankName'       => 'required|string|max:255',
             'accountNumber'  => 'required|string|max:255', 
             'accountName'  => 'required|string|max:255', 
             ]);
             
             $bankCode = $request->bankName;
             $bankName = ChooseBank::select('name')
             ->where('code', $bankCode)->pluck('name')->first();//remove bracket

             if(null !== $_POST['submit']){
                 //update table
                 User::where('id', $user_id)
                         ->update([
                         'bank' =>$bankName,
                         'account_name' =>$request->accountName,
                         'account_number' =>$request->accountNumber,
                     ]);
                     
                 Session::flash('success', ' Bank details saved successful!'); 
                 Session::flash('alert-class', 'alert-success'); 
             }
             \LogActivity::addToLog('Update');
             return redirect()->back()->with('success', 'Bank details saved successful!');
         } 
        else{
         return Redirect::to('/login');
        }
     } 


    public function sellerUpdateProfile(Request $request){
        if(Auth::user()){
             $user_id = Auth::user()->id; //
             $this->validate($request, [ 
             'address'       => 'required|string|max:255',
             'phone'         => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
             'image'         => 'image|mimes:jpg,png,jpeg|max:300',// maximum is 300kb , 600 x 600 pixel
             ]);

             if($request->hasFile('image')) {
                $image= $request->file('image');
                $imageName =  rand(1000000000, 9999999999).'.jpeg';
                $image->move(public_path('images/logo'),$imageName);
                $image_path = "/images/logo/" . $imageName; 
                // Process the new image.
                User::where('id', $user_id)
                ->update([
                    'address'       => $request->address,
                    'phone'         => $request->phone,
                    'profile_img'   => $image_path,  
                    'sms'          => $request->sms,        
                ]);
              }
            //update table
            User::where('id', $user_id)->update([
            'address'       => $request->address,
            'phone'         => $request->phone,
            'sms'          => $request->sms,  
            ]);

            $sms =  SMS::where('user_id', $user_id)->get('user_id')->first();
             if (empty($sms)){  
                $sms =  new SMS;
                $sms->user_id = Auth::user()->id;
                $sms->save(); 
             }
 
             \LogActivity::addToLog('Update');
             return redirect()->back()->with('success', 'Profile saved successful!');
         } 
        else{
         return Redirect::to('/login');
        }
     } 

     public function cooperativeUpdateProfile(Request $request){
        if(Auth::user()){
             $user_id = Auth::user()->id; //
             $this->validate($request, [  
             'address'              => 'required|string|max:255',
             'phone'                => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
             'rcnumber'             => 'string|max:255',
             'cooperative_type'     => 'required|string|max:255', 
             'image'                => 'image|mimes:jpg,png,jpeg|max:300',// maximum is 300kb , 600 x 600 pixel
             ]);
        
              if($request->hasFile('image')) {
                $image= $request->file('image');
                $imageName =  rand(1000000000, 9999999999).'.jpeg';
                $image->move(public_path('images/logo'),$imageName);
                $image_path = "/images/logo/" . $imageName; 
                // Process the new image.
                User::where('id', $user_id)
                ->update([
                'address'      => $request->address,
                'phone'        => $request->phone,
                'rcnumber'     => $request->rcnumber,
                'cooptype'     => $request->cooperative_type,
                'profile_img'  => $image_path,   
                'sms'          => $request->sms,       
                ]);

              }
                //update table
                User::where('id', $user_id)
                ->update([
                'address'      => $request->address,
                'phone'        => $request->phone,
                'rcnumber'     => $request->rcnumber,
                'cooptype'     => $request->cooperative_type, 
                'sms'          => $request->sms,      
                ]);
                
                $sms =  SMS::where('user_id', $user_id)->get('user_id')->first();
                if (empty($sms)){  
                    $sms =  new SMS;
                    $sms->user_id = Auth::user()->id;
                    $sms->save(); 
                }
              
             \LogActivity::addToLog('Update');
             return redirect()->back()->with('success', 'Profile saved successful!');
         } 
        else{
         return Redirect::to('/login');
        }
     } 


     public function memberUpdateProfile(Request $request){
        if(Auth::user()){
             $user_id = Auth::user()->id; //
             $this->validate($request, [
             'fname'         => 'max:255',  
             'address'       => 'required|string|max:255',
             'phone'         => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
             ]);
             if(null !== $_POST['submit']){
                 //update table
                 User::where('id', $user_id)
                         ->update([
                         'address'  => $request->address,
                         'phone'    => $request->phone,
                         'sms'      => $request->sms,
                     ]);
             }
             
             $sms =  SMS::where('user_id', $user_id)->get('user_id')->first();
             if (empty($sms)){  
                 $sms =  new SMS;
                 $sms->user_id = Auth::user()->id;
                 $sms->save(); 
             }
             \LogActivity::addToLog('Update');
             return redirect()->back()->with('success', 'Profile saved successful!');
         } 
        else{
         return Redirect::to('/login');
        }
     } 

   
     public function fmcgUpdateProfile(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id; //
            $this->validate($request, [ 
            'address'       => 'required|string|max:255',
            'phone'         => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
            'image'         => 'image|mimes:jpg,png,jpeg|max:300',// maximum is 300kb , 600 x 600 pixel
            ]);

            if($request->hasFile('image')) {
                $image= $request->file('image');
                $imageName =  rand(1000000000, 9999999999).'.jpeg';
                $image->move(public_path('images/logo'),$imageName);
                $image_path = "/images/logo/" . $imageName; 
                // Process the new image.
                User::where('id', $user_id)
                ->update([
                    'address'       => $request->address,
                    'phone'         => $request->phone,
                    'sms'          => $request->sms,
                    'profile_img'   => $image_path,        
                ]);
              }
           //update table
           User::where('id', $user_id)->update([
                'address'       => $request->address,
                'phone'         => $request->phone,
                'sms'          => $request->sms,
           ]);

           $sms =  SMS::where('user_id', $user_id)->get('user_id')->first();
                if (empty($sms)){  
                    $sms =  new SMS;
                    $sms->user_id = Auth::user()->id;
                    $sms->save(); 
                }
 
             \LogActivity::addToLog('Update');
             return redirect()->back()->with('success', 'Profile saved successful!');
         } 
        else{
         return Redirect::to('/login');
        }
     } 



   public function updateCertificate(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id; //
            $this->validate($request, [
            'cert' => 'required|mimes:jpg,jpeg,png|max:300',
        
            ]);
                if(null !== $_POST['submit']){
                $image= $request->file('cert');
                if(isset($image))
                {
                    
                    $extension = $request->file('cert')->getClientOriginalExtension(); 
                    $fileName= $request->file('cert')->getClientOriginalName(); 
                    $imageName =  rand(1000000000, 9999999999).'.'.$extension;
                    $image->move(public_path('assets/cooperativeCert'),$imageName);
                    $profile_image_path = "/assets/cooperativeCert/" . $imageName; 

                }

                else {
                    $path = "";
                }
                    //update table
                    User::where('id', $user_id)
                        ->update([
                        'cooperative_cert'   =>$profile_image_path
                    ]);

                    Session::flash('success', ' Upload Successful!'); 
                    Session::flash('alert-class', 'alert-success'); 
                }
            \LogActivity::addToLog('Update');
            return redirect()->back()->with('success', ' Upload Successful!');
        } 
        else{
            return Redirect::to('/login');  
        }
    }
    
    public function registerCoopMember(Request $request){
        return view('auth.coop-member-register-url');
    }

    public function createCoopMember(Request $request)
    {
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
            Session::flash('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk'); 
            Session::flash('alert-class', 'alert-success'); 
          return redirect('/')->with('success', ' You have successfully registered!. <br> Verification link has been sent to your email address. <br> Check your inbox or spam/junk');        
    }
}//class
