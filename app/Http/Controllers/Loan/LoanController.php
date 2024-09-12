<?php

namespace App\Http\Controllers\Loan;

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
use App\Notifications\NewLoan;
use App\Notifications\AdminApproveLoan;
use App\Mail\LoanRequestEmail;

use Carbon\Carbon;
use Auth;
use Validator;
use Session;
use Paystack;
use Storage;
use Mail;
use Notification;
use DateTime;

class LoanController extends Controller
{
    //
    public function __construct()
    {
       // $this->middleware(['auth','verified']);
       // $this->middleware('cooperative');
    }

    public function loan(Request $request){
        if( Auth::user()->role_name  == 'cooperative'){
        return view('loan.loan-packages');
        }
        else{ return redirect()->back()->with('success', 'Access denied!, Only cooperatives can subscribe.');}
    }

    public function addLoan(Request $request){
        if( Auth::user()){
            $id = Auth::user()->id;
            $cooperativeCode = Auth::user()->code;
            $cooperative = Auth::user()->coopname;
            $fname = Auth::user()->fname;
            $coopId = User::where('role', '=', '2')
            ->where('code', $cooperativeCode)
            ->get();

            $adminEmail = User::where('role', '=', '2')
            ->where('code', $cooperativeCode)
            ->get()->pluck('email')->first();

            $this->validate($request, [  
                'service_fee'     => 'string|max:255',
            ]);
            $checkExistingLoan = DB::table('loan')->select('loan_balance')
            ->where('loan_balance', '!=', '0')
            ->where('loan_status', '=', 'payout')
            ->where('member_id', $id)
            ->get()->first();
         

            $checkLoanrequest = DB::table('loan')->select('principal')
            ->where('loan_status', '=', 'request')
           ->orwhere('loan_status', '=', 'approved')
            ->where('member_id', $id)
            ->get()->first();

            // if($checkExistingLoan){
            // return redirect('member-request-loan')->with('loanExist', 'You have unfinished loan');
            // }
            // elseif($checkLoanrequest) {
            //     # code...
            //     return redirect('member-request-loan')->with('loanExist',  'You have a pending loan request.  Contact admin');
                
            // }
            // else{ 
                if($request->annual_interest < 1){
                    return redirect('member-request-loan')->with('loan', 'Interest on cash loan can not be "0". Contact admin'); 
                }
                $loan = new Loan;
                $loan->member_id            = $id;
                $loan->cooperative_code     = $cooperativeCode;
                $loan->loan_type            = $request->ratetype;
                $loan->principal            = $request->principal;
                $loan->interest             = $request->annual_interest;
                $loan->total                = $request->total_due;
                $loan->duration             = $request->duration;
                $loan->loan_balance         = $request->total_due;
                $loan->loan_status          = 'request';
                $loan->save();
                if($loan){
                    $loanRepayment = new LoanRepayment;
                    $loanRepayment->loan_id             = $loan->id;
                    $loanRepayment->member_id           = $id;
                    $loanRepayment->cooperative_code    = $cooperativeCode;
                    $loanRepayment->loan_type           = $request->ratetype;
                    $loanRepayment->monthly_principal   = $request->monthly_principal;
                    $loanRepayment->monthly_interest     = $request->monthly_interest;
                    $loanRepayment->monthly_due         = $request->monthly_due;
                    $loanRepayment->save();
                  
                }
                else{
                    return redirect('member-request-loan')->with('loan', 'Opps! Something went wrong');
                }
            //}
            $amount = $request->principal;
            $loan_type = $request->ratetype;
          
            $notification = new NewLoan($amount);
            Notification::send($coopId, $notification);
             //send emails
              $data = array(
              'cooperative'   => $cooperative,
              'loan_type'     => $loan_type,  
              'amount'        => $amount, 
              'name'          => $fname, 
                );
  
            Mail::to($adminEmail)->send(new LoanRequestEmail($data)); 
           return redirect('member-loan-history')->with('loan', 'Loan request successful!');

        }
        else{
            return Redirect::to('/login');
        }
    }

    public function cooperativeAddLoan(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $code = Auth::user()->code;
            
            $this->validate($request, [  
                'service_fee'     => 'string|max:255',
            ]);
            $memberID= preg_split("/[,]/",$request->memberID);

            $checkExistingLoan = Loan::whereIn('member_id', $memberID)
           ->where('loan_balance', '!=', null)
            ->where('loan_balance', '!=', '0')
            ->where('loan_status', '=', 'payout')
            ->get('*')->pluck('loan_balance');
            $getmMembers = User::join('loan', 'loan.member_id', '=', 'users.id')
            ->whereIn('loan.member_id', $memberID)->get('*')->pluck('fname');
            $members = substr($getmMembers, 1, -1);

            $checkLoanrequest = Loan::whereIn('member_id', $memberID)
             ->where('loan_status', '=', 'request')
             ->where('loan_status', '=', 'approved')
             ->get('*')->pluck('principal');

            // if(!$checkExistingLoan->isEmpty()){
            // return redirect('cooperative-create-loan')->with('loanExist',  ''.$members.' has unfinished loan');
            // }
            // elseif (!$checkLoanrequest->isEmpty()) {
            //     # code...
            //     return redirect('cooperative-create-loan')->with('loanExist',  ''.$members.' has a pending loan request');
                
            // }
           // else{ 
            if($request->annual_interest < 1){
                $setInterest = url('/account-settings');
                return redirect('cooperative-create-loan')->with('loan', 'Interest on cash loan can not be "0" . Click here set interest '.$setInterest); 
            }

                $loan = new Loan;
                $loan->member_id            = $request->memberID;
                $loan->cooperative_code     = $code;
                $loan->loan_type            = $request->ratetype;
                $loan->principal            = $request->principal;
                $loan->interest             = $request->annual_interest;
                $loan->total                = $request->total_due;
                $loan->duration             = $request->duration;
                $loan->loan_balance         = $request->total_due;
                $loan->loan_status          = 'request';
                $loan->save();
                if($loan){
                    $loanRepayment = new LoanRepayment;
                    $loanRepayment->loan_id             = $loan->id;
                    $loanRepayment->member_id           = $request->memberID;
                    $loanRepayment->cooperative_code    = $code;
                    $loanRepayment->loan_type        = $request->ratetype;
                    $loanRepayment->monthly_principal   = $request->monthly_principal;
                    $loanRepayment->monthly_interest     = $request->monthly_interest;
                    $loanRepayment->monthly_due         = $request->monthly_due;
                    $loanRepayment->save();
                  
                }
                else{
                    return redirect('cooperative-create-loan')->with('loan', 'Opps! Something went wrong');
                }
            //}
          
           return redirect('cooperative-loan')->with('loan', 'Loan added successful!');

        }
        else{
            return Redirect::to('/login');
        }
    }

    public function signaturePad(Request $request){
        return view('loan.sign-pad');
    }

    public function uploadSignature(Request $request)
    {
        $folderPath = public_path('images/guarantor/signature/');
        
        $image_parts = explode(";base64,", $request->signed);
              
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
           
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        return back()->with('success', 'success Full upload signature');
    }

    public function cooperativeloanInvoice(Request $request, $loan_id )
    {
        if( Auth::user()->role_name  == 'cooperative'){
            $code = Auth::user()->code; //
            $item = Loan::join('users', 'users.id', '=', 'loan.member_id')
            ->leftjoin('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
             ->leftjoin('loan_type', 'loan_type.name', '=', 'loan_repayment.loan_type')
            ->leftjoin('due_loans', 'due_loans.loan_id', '=', 'loan.id')
            ->where('loan.cooperative_code', $code)
            ->where('loan.id', $loan_id)
            ->get(['loan.*', 
            'users.fname',
            'users.address',
            'users.phone',
            'users.email',
            'loan_repayment.monthly_principal',  
            'loan_repayment.monthly_interest',   
            'loan_repayment.next_due_date',  
            'loan_type.name',  
            'loan_type.percentage_rate',  
            'loan_type.rate_type',  
            'due_loans.monthly_due',  
            'due_loans.due_date'])->first();
        
            $loan =  Loan::join('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
             ->leftjoin('loan_type', 'loan_type.name', '=', 'loan_repayment.loan_type')
            ->leftjoin('due_loans', 'due_loans.loan_id', '=', 'loan.id')
            ->where('loan.cooperative_code', $code)
            ->where('loan.id', $loan_id)
            ->orderBy('due_loans.due_date')
            ->get(['loan.*', 
            'loan_repayment.monthly_principal',  
            'loan_repayment.monthly_interest',   
            'loan_repayment.next_due_date',  
            'loan_type.name',  
            'loan_type.percentage_rate',  
            'loan_type.rate_type',  
            'due_loans.monthly_due',  
            'due_loans.due_date',
            'due_loans.payment_status']);  

            \LogActivity::addToLog('Laon invoice');
        return view('loan.loan-invoice', compact('item', 'loan'));
        }

    else { return Redirect::to('/login');}             
    }

    public function memberloanInvoice(Request $request, $loan_id )
    {
        if( Auth::user()->role_name  == 'member'){
            $id = Auth::user()->id; //
            $item = Loan::join('users', 'users.id', '=', 'loan.member_id')
            ->leftjoin('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
             ->leftjoin('loan_type', 'loan_type.name', '=', 'loan_repayment.loan_type')
            ->leftjoin('due_loans', 'due_loans.loan_id', '=', 'loan.id')
            ->where('loan.member_id', $id)
            ->where('loan.id', $loan_id)
            ->get(['loan.*', 
            'users.fname',
            'users.address',
            'users.phone',
            'users.email',
            'loan_repayment.monthly_principal',  
            'loan_repayment.monthly_interest',   
            'loan_repayment.next_due_date',  
            'loan_type.name',  
            'loan_type.percentage_rate',  
            'loan_type.rate_type',  
            'due_loans.monthly_due',  
            'due_loans.due_date'])->first();
        
            $loan =  Loan::join('loan_repayment', 'loan_repayment.loan_id', '=', 'loan.id')
             ->leftjoin('loan_type', 'loan_type.name', '=', 'loan_repayment.loan_type')
            ->leftjoin('due_loans', 'due_loans.loan_id', '=', 'loan.id')
            ->where('loan.member_id', $id)
            ->where('loan.id', $loan_id)
            ->orderBy('due_loans.due_date')
            ->get(['loan.*', 
            'loan_repayment.monthly_principal',  
            'loan_repayment.monthly_interest',   
            'loan_repayment.next_due_date',  
            'loan_type.name',  
            'loan_type.percentage_rate',  
            'loan_type.rate_type',  
            'due_loans.monthly_due',  
            'due_loans.due_date',
            'due_loans.payment_status']);  

            \LogActivity::addToLog('Laon invoice');
        return view('loan.loan-invoice', compact('item', 'loan'));
        }

    else { return Redirect::to('/login');}             
    }
}//class
