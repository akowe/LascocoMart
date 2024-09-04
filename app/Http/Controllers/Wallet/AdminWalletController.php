<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\LoanRepayment;
use App\Models\LoanSetting;
use App\Models\DueLoans;
use App\Models\LoanPaymentTransaction;
use App\Models\Settings;
use App\Models\ChooseBank;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Credit;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Models\Categories;
use App\Models\Product;

use Carbon\Carbon;
use Auth;
use Validator;
use Session;
use Paystack;
use Storage;
use Mail;
use Notification;
use DateTime;

class AdminWalletController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']);
        $this->middleware('cooperative');
    }
    public function adminWallet(Request $request){
        if( Auth::user()->role_name  == 'cooperative'){
            $code = Auth::user()->code; 
            $id = Auth::user()->id; 
            $checkUser =  DB::table('wallet')
            ->select(['wallet_account_number'])
            ->where('user_id', $id)
            ->where('cooperative_code', $code)
            ->pluck('wallet_account_number')->first();
            if(empty($checkUser)){
                Session::flash('no-wallet', ' You do not have a wallet. Kindly create one!'); 
            }

            return view('wallet.cooperative.admin-wallet', compact('checkUser'));
        }
        else { return Redirect::to('/login');}
    }
}
