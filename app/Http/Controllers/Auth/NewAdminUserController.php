<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\NewUserEmail;
use App\Models\Voucher;
use App\Models\Wallet;
use Session;
use Auth;
use Mail; 
use Carbon\Carbon;

class NewAdminUserController extends Controller
{
    

    public function __construct(){
      //
    }
   
  
    public function newAdminUser(Request $request){
      if( Auth::user()->role_name  == 'superadmin'){
          $request->validate([
            'email'     =>'required|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'fname'     => 'required|max:255', 
            'phone'     => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:13',
            'coopname'  => 'required|string|max:255', 
            'role_name' => 'required|string',
        ]);
  
          if($request->role_name == 'fmcg'){
              $role = '33';
          }elseif($request->role_name == 'cooperative'){
              $role = '2';
          }
          else{
              $role ='';
          }
          $lascocoID =rand(100,999);
          $code = 'Lascoco'.$lascocoID;
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $randomString = '';
         $num = 8;
         for ($a = 0; $a < $num; $a++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
         }
         $password = str_shuffle($randomString);
          $user = new User();
          $user->role         = $role;
          $user->role_name    = $request->role_name;
          $user->fname        =$request->fname;
          $user->code         = $code;
          $user->coopname     = $request->coopname;
          $user->phone        = $request->phone;
          $user->email        = $request->email;
          $user->password     = Hash::make($password);
          $user->password_reset_at = Carbon::now();
          $user->save();
          if($user){
          $rand = rand(1000000000,9999999999);
          $voucher = new Voucher();
          $voucher->user_id = $user->id;
          $voucher->voucher = $rand;
          $voucher->credit = '0';
          $voucher->save();
            
          $wallet = new Wallet();
          $wallet->user_id = $user->id;
          $wallet->balance = '0';
          $wallet->save();
          $email= $request->email;
         // $url = 'http://localhost:8000/show-set-password/'.$email;
          //send emailto new user
          $data = 
          array(
            'password'   => $password ,   
            'email'     => $email,
        );
          Mail::to($email)->send(new NewUserEmail($data));  
        }
  
          Session::flash('success', ' New user created successfully. <br> login details has been sent to user email address. <br> User to check his/her inbox or spam/junk'); 
          Session::flash('alert-class', 'alert-success'); 
          return redirect()->back()->with('success', ' New user created successfully. <br> login details has been sent to user email address. <br> User to check his/her inbox or spam/junk');         
      }
    }
  
}