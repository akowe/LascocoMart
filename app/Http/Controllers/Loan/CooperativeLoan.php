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
use App\Models\Settings;
use App\Models\ChooseBank;
use App\Models\DueLoans;
use App\Models\LoanPaymentTransaction;
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
use App\Mail\LoanApprovedEmail;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use Validator;
use Session;
use Paystack;
use Storage;
use Mail;
use Notification;
use DateTime;

class CooperativeLoan extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('cooperative');
    }

    public function cooperativeLoan(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $code = Auth::user()->code; 
            $id = Auth::user()->id; //
            $totalLoan = DB::table('loan')
            ->where('loan_status', 'payout')
            ->where('cooperative_code', $code); 

            $totalLoanRemaining ='';
            $countMemberLoan = Loan::join('users', 'users.id', '=', 'loan.member_id')
            ->where('users.code', $code) 
            ->where('loan.loan_status', 'payout')
            ->get('loan.*');  

            $chartLoanInterestDate = Loan::select('updated_at')
            ->where('interest', '!=', null)
            ->whereYear('updated_at', Carbon::now()->year)
            ->where('cooperative_code', $code)
            ->get();
            $getLoanDate = Arr::pluck($chartLoanInterestDate, 'updated_at');
            $date = $getLoanDate; 

            $chartTotalInterest =Loan::select('interest')
            ->where('cooperative_code', $code)
            ->get();
            $getInterest = Arr::pluck($chartTotalInterest, 'interest');
           // $interest = json_encode($getInterest); 
            $interest = $getInterest; 

            $chartLoanPaid = LoanRepayment::join('due_loans', 'due_loans.loan_id', '=', 'loan_repayment.loan_id')
            ->select('due_loans.monthly_due')
            ->where('due_loans.payment_status', 'paid')
            ->where('due_loans.cooperative_code', $code)
            ->get();
            $getPaidLoan =Arr::pluck($chartLoanPaid, 'monthly_due');
            $paidLoan  = $getPaidLoan; 

            $chartLoanBalance = Loan::select('loan_balance')
            ->where('cooperative_code', $code)
            ->get();
            $getLoanBalance =Arr::pluck($chartLoanBalance, 'loan_balance');
            $loanBalance  = $getLoanBalance; 

            $chartMonthlyDue = LoanRepayment::select('*')
            ->where('cooperative_code', $code)
            ->where('repayment_status', null)
            ->whereMonth('updated_at', Carbon::now()->month)
            ->get();
            $getLoanMonthly =Arr::pluck($chartMonthlyDue, 'monthly_due');
            $loanMonthly  = $getLoanMonthly; 

            $totalMonthlyDueLoan =  LoanRepayment::join('loan', 'loan.id', '=', 'loan_repayment.loan_id')
           ->select('loan_repayment.monthly_due')
            ->where('loan.loan_status', 'payout')
            ->where('loan.cooperative_code', $code)
             ->whereMonth('loan_repayment.next_due_date', Carbon::now()->month)
            ->whereYear('loan_repayment.updated_at', Carbon::now()->year);
        
            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');
            $loan = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
           ->join('loan_type', 'loan_type.name', '=', 'loan.loan_type')
            ->select(['loan.*', 'loan_type.name', 'users.fname'])
            ->where('loan.cooperative_code', $code)
            ->orderBy('loan.created_at', 'desc')
            ->where(function ($query) use ($search) {  // <<<
            $query->where('users.fname', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan.principal', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan.interest', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan.total', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan.duration', 'LIKE', '%'.$search.'%')
                     ->orWhere('loan.loan_status', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan_type.name', 'LIKE', '%'.$search.'%')
                   ->orderBy('loan.created_at', 'desc');
            })->paginate($perPage, $columns = ['*'], $pageName = 'loan'
            )->appends(['per_page'   => $perPage]);
        
            $pagination = $loan->appends ( array ('search' => $search) );
                if (count ( $pagination ) > 0){
                    return view ('loan.cooperative.cooperative-loan' ,  compact(
                    'perPage', 'loan', 'interest',  'date', 'totalLoan',
                    'countMemberLoan', 'paidLoan', 'loanBalance', 'loanMonthly', 'totalMonthlyDueLoan'))->withDetails( $pagination );     
                } 
                else{redirect()->back()->with('loan-status', 'No record order found'); }   
            \LogActivity::addToLog('Admin loanDashboard'); 

            return view('loan.cooperative.cooperative-loan', compact('perPage',
            'loan', 'interest',  'date',  'totalLoan', 'countMemberLoan',
            'paidLoan', 'loanBalance', 'loanMonthly', 'totalMonthlyDueLoan'));
        }
        else{
            return Redirect::to('/login');
        }
    }


    public function loanType(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $id = Auth::user()->id;
            $code = Auth::user()->code;
            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');

            $productLoantypes = DB::table('loan_type')
            ->select(['loan_type.name'])
            ->where('admin_id', $id)
            ->where('name', 'product')
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->pluck('name')->first();

            $cashLoantypes = DB::table('loan_type')
            ->select(['loan_type.name'])
            ->where('admin_id', $id)
            ->where('name', 'normal')
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->pluck('name')->first();

            $productLoanInterest = DB::table('loan_type')
            ->select(['loan_type.percentage_rate'])
            ->where('admin_id', $id)
            ->where('name', 'product')
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->pluck('percentage_rate')->first();


            $productLoanMinimumDuration = DB::table('loan_type')
            ->select(['loan_type.min_duration'])
            ->where('admin_id', $id)
            ->where('name', 'product')
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->pluck('min_duration')->first();

            $productLoanMaximumDuration = DB::table('loan_type')
            ->select(['loan_type.max_duration'])
            ->where('admin_id', $id)
            ->where('name', 'product')
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->pluck('max_duration')->first();

            $productLoanID = DB::table('loan_type')
            ->select(['loan_type.id'])
            ->where('admin_id', $id)
            ->where('name', 'product')
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->pluck('id')->first();
           // dd($productLoanID);

           if(empty($productLoantypes)){
            $addLoan  = new LoanType;
            $addLoan->admin_id          = $id;
            $addLoan->cooperative_code  = $code;
            $addLoan->name              = 'product';
            $addLoan->percentage_rate   = '0';
            $addLoan->rate_type         = 'flat rate';
            $addLoan->min_duration      = '1';
            $addLoan->max_duration      = '1';
            $addLoan->save();
           }
           if(empty($cashLoantypes)){
            $addLoan  = new LoanType;
            $addLoan->admin_id          = $id;
            $addLoan->cooperative_code  = $code;
            $addLoan->name              = 'normal';
            $addLoan->percentage_rate   = '0';
            $addLoan->rate_type         = 'flat rate';
            $addLoan->min_duration      = '1';
            $addLoan->max_duration      = '1';
            $addLoan->save();
           }
           
            $loantypes = DB::table('loan_type')->select(['loan_type.*'])
            ->where('admin_id', $id)
            ->where('cooperative_code', $code)
            ->where('deleted_at', '=', null)
            ->orderBy('loan_type.created_at', 'desc')
            ->where(function ($query) use ($search) {  // <<<
            $query->where('loan_type.name', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan_type.percentage_rate', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan_type.rate_type', 'LIKE', '%'.$search.'%')
                   ->orWhere('loan_type.max_duration', 'LIKE', '%'.$search.'%')
                   ->orderBy('loan_type.created_at', 'desc');
            })->paginate($perPage, $columns = ['*'], $pageName = 'loantypes'
            )->appends(['per_page'   => $perPage]);
        
            $pagination = $loantypes->appends ( array ('search' => $search) );
                if (count ( $pagination ) > 0){
                    return view ('loan.cooperative.loan-type' ,  compact(
                    'perPage', 'loantypes', 'productLoantypes', 'cashLoantypes',
                    'productLoanInterest', 'cashLoanInterest', 'productLoanMinimumDuration', 
                    'productLoanMaximumDuration', 'productLoanID'))->withDetails( $pagination );     
                } 
                else{redirect()->back()->with('loanType-status', 'No record order found'); }   
            \LogActivity::addToLog('Admin loanType'); 
            return view('loan.cooperative.loan-type', compact(
                'perPage', 'loantypes', 'productLoantypes', 'cashLoantypes',
                'productLoanInterest', 'cashLoanInterest', 'productLoanMinimumDuration', 
                'productLoanMaximumDuration', 'productLoanID'));
        }
        else{
            return Redirect::to('/login');
        }
    }

    public function updateLoanSetting(Request $request){
        if(Auth::user()){
            $code = Auth::user()->code; 
            $id = Auth::user()->id; //
            $this->validate($request, [ 
                'repayment'         => 'required|number|max:255',
                'interest'          => 'required|number|max:255',
                'rate_type'         => 'required|number|max:255',
                'max_duration'      => 'required|number|max:255',
                 ]);       

            $repayment = $request->repayment;
            if($repayment == 0){
                return redirect()->back()->with('loan-repayment', 'Loan repayment date can not be "0" ');
            }
    
            $checkLoanSetting = LoanSetting::where('cooperative_code', $code)->first();
             if (empty($checkLoanSetting)) {
                $newSetting  = new LoanSetting;
                $newSetting->cooperative_code  = $code;
                $newSetting->user_id           = $id;
                $newSetting->percentage_rate   = $request->interest;
                $newSetting->rate_type          = $request->rate_type;
                // $newSetting->processing_fee    = $request->processing_fee;
                // $newSetting->max_loan          = $request->maximum_loan;
                $newSetting->max_duration      = $request->max_duration;
                $newSetting->min_duration      = $request->min_duration;
                $newSetting->approval_level    = $request->approval_level;
                $newSetting->start_repayment   = $repayment; 
                $newSetting->save();   
                return redirect()->back()->with('success', 'Loan settings successfully added');
            }
            else{
                $loanSeeting = LoanSetting::where('cooperative_code', $code)
                ->update([
                'user_id'           => $id,
                // 'processing_fee'    => $request->processing_fee,
                // 'max_loan'          => $request->maximum_loan,
                'approval_level'    => $request->approval_level,
                'start_repayment'   => $repayment,
                'max_duration'      => $request->max_duration,
                'min_duration'      => $request->min_duration,
                'percentage_rate'   => $request->interest,
                'rate_type'          => $request->rate_type
                ]);
                return redirect()->back()->with('success', 'Loan settings successfully added');
            } 
        }
        else{ return Redirect::to('/login');}
    }

     public function addLoanType(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $user_id = Auth::user()->id; 
            $cooperativeCode = Auth::user()->code;
            $this->validate($request, [  
            'name'              => 'required|string|max:255',
           // 'rate'              => 'required|string|max:255',
            //'rate_type'         => 'required|string|max:255',
            // 'guarantor'         => 'max:255',
            'minimum_duration'  => 'string|max:255',
            'maximum_duration'  => 'required|string|max:255',
            'description'       => 'max:255',
             ]);

            $addLoan  = new LoanType;
            $addLoan->admin_id          = $user_id;
            $addLoan->cooperative_code  = $cooperativeCode;
            $addLoan->name              = $request->name;
            //$addLoan->percentage_rate   = $request->rate;
            //$addLoan->rate_type         = $request->rate_type;
            // $addLoan->guarantor         = $request->guarantor;
            $addLoan->min_duration      = $request->minimum_duration;
            $addLoan->max_duration      = $request->maximum_duration;
            $addLoan->description       = $request->description;
            $addLoan->save();
            if($addLoan){
                return redirect('cooperative-loan-type')->with('success', 'Loan type successfully added');
            }
            else{
                return redirect('cooperative-loan-type')->with('status', 'Opps! something went wrong');
            }
        }
        else{ return Redirect::to('/login');}
     }

     public function  cooperativeApproveLoan(Request $request, $loan_id){
        if(Auth::user()->role_name == 'cooperative'){
            $code = Auth::user()->code;
            $loanPrincipal = DB::table('loan')
            ->where('id', $loan_id)
            ->select('*')
            ->pluck('principal')->first();

            $loanMemberID = DB::table('loan')
            ->where('id', $loan_id)
            ->select('*')
            ->pluck('member_id')->first();

            $loanMember = DB::table('users')
            ->where('id', $loanMemberID)
            ->select('*')
            ->pluck('fname')->first();

            $checkApprovalLevel = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('approval_level')->first();
            if($checkApprovalLevel > 1){
                Session::flash('approval', ' Required ' .$checkApprovalLevel.' approval'); 
                Session::flash('alert-class', 'alert-warning'); 
            }
            else{
                Session::flash('approval', ' Required ' .$checkApprovalLevel.' approval'); 
                Session::flash('alert-class', 'alert-warning');  
            }
            return view('loan.cooperative.approve-loan', compact('checkApprovalLevel', 
            'loanPrincipal', 'loanMember', 'loan_id',  'loanMemberID'));
            
        }
        else{ return Redirect::to('/login');}
     }

     public function approveLoan(Request $request){
        if(Auth::user()){
            $id = Auth::user()->id;
            $code = Auth::user()->code;
            $cooperative = Auth::user()->coopname;
            $adminEmail= Auth::user()->email;

            $loanID = $request->loan_id;
            $loanApprovalLevel = DB::table('loan')
            ->where('cooperative_code', $code)
            ->where('id', $loanID )
            ->select('*')
            ->pluck('loan_approval_level')
            ->first();

            $approvalLevel = $loanApprovalLevel + 1;
            $approveLoan = Loan::where('id', $loanID)
            ->update([
                'loan_status'           => 'approved',
                'loan_approval_level'   =>  $approvalLevel,
                'approval_agent'        => $id,
            ]);
            $amount = $request->amount;
            $member_id = User::findOrFail($request->member_id);
            $memberName =  User::where('id', $member_id)->get()->pluck('fname')->first();
            //send notification for aprrove loan to member
            $notification = new AdminApproveLoan($amount);
            Notification::send($member_id, $notification);
            //send emails
            $data = array(
                'cooperative'   => $cooperative, 
                'amount'        => $amount, 
                'name'          => $memberName, 
            );
    
              Mail::to($adminEmail)->send(new LoanApprovedEmail($data)); 

        return redirect('cooperative-loan')->with('success', 'Loan approval successful');

        }
        else{ return Redirect::to('/login');}
     }

     public function cooperativeLoanPayOut(Request $request, $loan_id){
        if(Auth::user()){
            $code = Auth::user()->code;
            $id = Auth::user()->id;

            $loanRepaymentStart = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('start_repayment')->first();

            $checkApprovalLevel = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('approval_level')->first();

            $loanApproval = DB::table('loan')
            ->where('id', $loan_id)
            ->select('*')
            ->pluck('loan_approval_level')->first();
            if( $checkApprovalLevel >  $loanApproval){
                $RemainApproval = $checkApprovalLevel - $loanApproval;
                Session::flash('approval', ' This loan has ' .$loanApproval. ' approval, remiain '.$RemainApproval . ' more'); 
            }
            elseif ($checkApprovalLevel = $loanApproval) {
                # code...
                Session::flash('approval', ' Loan approval completed!'); 
            }
            $loanPrincipal = DB::table('loan')
            ->where('id', $loan_id)
            ->where('cooperative_code', $code)
            ->select('*')->pluck('principal')->first();

            $loanBeneficiary = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
            ->where('loan.id', $loan_id)
            ->where('loan.cooperative_code', $code)
            ->select('loan.*', 'users.fname')->pluck('fname')->first();

            $loanDuration = DB::table('loan')
            ->where('id', $loan_id)
            ->where('cooperative_code', $code)
            ->select('*')->pluck('duration')->first();
            $repaymentStartDate = '';
            $repaymentEndDate =  '';
            $payOutDate =  '';

            return view('loan.cooperative.loan-payout', compact('checkApprovalLevel', 
            'loanPrincipal', 'loanBeneficiary', 'loanDuration', 'loanRepaymentStart',
            'repaymentStartDate', 'repaymentEndDate', 'loan_id', 'payOutDate'));
        }
        else{ return Redirect::to('/login');} 
     }

     public function calLoanRepayment(Request $request, $loan_id, $date){
        if(Auth::user()){
            $code = Auth::user()->code;
            $id = Auth::user()->id;
            //$date =  strtotime($loandate);
            //dd($date);

            $loanRepaymentStart = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('start_repayment')->first();

            $checkApprovalLevel = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('approval_level')->first();

            $loanApproval = DB::table('loan')
            ->where('id', $loan_id)
            ->select('*')
            ->pluck('loan_approval_level')->first();
            if( $checkApprovalLevel >  $loanApproval){
                $RemainApproval = $checkApprovalLevel - $loanApproval;
                Session::flash('approval', ' This loan has ' .$loanApproval. ' approval, remiain '.$RemainApproval . ' more'); 
            }
            elseif ($checkApprovalLevel = $loanApproval) {
                # code...
                Session::flash('approval', ' Loan approval completed!'); 
            }
            $loanPrincipal = DB::table('loan')
            ->where('id', $loan_id)
            ->where('cooperative_code', $code)
            ->select('*')->pluck('principal')->first();

            $loanBeneficiary = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
            ->where('loan.id', $loan_id)
            ->where('loan.cooperative_code', $code)
            ->select('loan.*', 'users.fname')->pluck('fname')->first();

            $loanDuration = DB::table('loan')
            ->where('id', $loan_id)
            ->where('cooperative_code', $code)
            ->select('*')->pluck('duration')->first();
            
            $cooperativeRepaymentStart = DB::table('loan_settings')
            ->where('cooperative_code', $code)
            ->select('*')
            ->pluck('start_repayment')->first();

            //Carbon::now()->addDays(5);
            $loanStartRepaymentDay = $cooperativeRepaymentStart * 30;//30 days
            $loanEndPeriod =  $loanDuration * 30; 
            $payOutDate = $date;
            
            $getRepaymentStartDate = Carbon::createFromFormat('Y-m-d', $payOutDate)->addDays($loanStartRepaymentDay);
            $repaymentStartDate =  $getRepaymentStartDate->format('Y-m-d');

            $getRepaymentEndDate =  Carbon::createFromFormat('Y-m-d', $payOutDate)->addDays( $loanEndPeriod);
            $repaymentEndDate =  $getRepaymentEndDate->format('Y-m-d');
            return view('loan.cooperative.loan-payout', compact('checkApprovalLevel', 
            'loanPrincipal', 'loanBeneficiary', 'loanDuration', 'loanRepaymentStart',
            'repaymentStartDate', 'repaymentEndDate', 'loan_id', 'payOutDate'));
        }
        else{ return Redirect::to('/login');} 
     }

     public function storeLoanRepayment(Request $request){
        if(Auth::user()){
            $code =  Auth::user()->code;
            $loanID = $request->loan;
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $memberID = DB::table('loan')
            ->where('id', $loanID)
            ->where('cooperative_code', $code)
            ->select('*')->pluck('member_id')->first();

            $memberMonthlyDueAmount = DB::table('loan_repayment')
            ->where('loan_id', $loanID)
            ->where('member_id', $memberID)
            ->select('*')->pluck('monthly_due')->first();

            $updateLoan = DB::table('loan')
            ->where('id', $loanID)
            ->where('cooperative_code', $code)
            ->update([
                'start_date' => $startDate,
                'end_date'   => $endDate,
            ]); 
         
            $startPeriod = Carbon::parse($startDate);
            $endPeriod   = Carbon::parse($endDate);
            $period = CarbonPeriod::create($startPeriod, '30 days', $endPeriod);
            $loanDueDates  = [];
                 
            foreach ($period as $date) {
                $loanDueDates[] = $date->format('Y-m-d');
            }
            $monthlyDueDates = json_encode($loanDueDates);
            foreach($loanDueDates as $dueDate){
                $dueLoan = new DueLoans;
                $dueLoan->loan_id           =  $loanID;
                $dueLoan->member_id         =  $memberID;
                $dueLoan->cooperative_code  =  $code;
                $dueLoan->monthly_due       =  $memberMonthlyDueAmount;
                $dueLoan->due_date          =  $dueDate;
                $dueLoan->payment_status    =  'pending';
                $dueLoan->save();
            }

            if($dueLoan){
              $updateLoanStatus =  DB::table('loan')
                ->where('id', $loanID)
                ->where('cooperative_code', $code)
                ->update([
                'loan_status' => 'payout',
                ]); 

                $updateLoanRepayment = DB::table('loan_repayment')
                ->where('loan_id', $loanID)
                ->where('cooperative_code', $code)
                ->update([
                    'next_due_date' => $startDate,
                ]);
            }
            return redirect('cooperative-loan')->with('success', 'PayOut successful!');

        }
        else{ return Redirect::to('/login');} 
     }

     public function createMemberLoan(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $code = Auth::user()->code;
            $memberName = User::all()->where('code', $code)->except(Auth::id()); 
            $chooseLoanType = LoanType::select('name', 'id')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->get();

            $chooseLoanTypeName = LoanType::select('name')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->pluck('name')->first();


            $chooseLoanTypeID = LoanType::select('id')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->pluck('id')->first();

            $members='';
            $memberID = '';
            $principal = '';
            $annualInterest = '';
            $totalDue = '';
            $rateType = '';
            $duration ='';
            $maxTenure = '';
            $percentage = '';
            $loanType = '';
            $loanTypeID = '';
            return view('loan.cooperative.create-loan', compact('members', 'memberName', 'memberID', 'chooseLoanType', 'loanType',
            'principal', 'maxTenure', 'percentage', 'annualInterest', 'totalDue',
            'rateType','duration', 'loanTypeID', 'chooseLoanTypeName', 'chooseLoanTypeID'));

        }
        else{ return Redirect::to('/login');} 

     }

     public function calculateInterest(Request $request, $amount, $duration, $memberID){
        if(Auth::user()){
            $admin_id = Auth::user()->id;
            $code = Auth::user()->code;
            $memberName = User::all()->where('code', $code)->except(Auth::id()); 

            $userID= preg_split("/[,]/",$memberID);
            $getmMembers = User::whereIn('id', $userID)->get('*')->pluck('fname');
            $members = substr($getmMembers, 1, -1);

            $chooseLoanType = LoanType::select('name', 'id')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->get();

            $chooseLoanTypeName = LoanType::select('name')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->pluck('name')->first();


            $chooseLoanTypeID = LoanType::select('id')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->pluck('id')->first();
           
            $loanTypeID = LoanType::select('name')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->pluck('name')->first();

            $getLoanTypeName = LoanType::select('name')
            ->where('name', 'normal')
            ->where('cooperative_code', $code)->get();
            $loanTypeName =Arr::pluck($getLoanTypeName, 'name');
            $loanType = implode(" ",$loanTypeName); 

            // $getRateType = LoanSetting::select('rate_type')
            // ->where('cooperative_code', $code)->get();
            // $loanRateType =Arr::pluck($getRateType, 'rate_type');
            // $rateType = implode(" ",$loanRateType); 

            // $getPercentage = LoanSetting::select('percentage_rate')
            // ->where('cooperative_code', $code)->get();
            // $loanPercentage =Arr::pluck($getPercentage, 'percentage_rate');
            // $percentageRate = implode(" ",$loanPercentage); 

            // $getTenure = LoanSetting::select('max_duration')
            // ->where('cooperative_code', $code)->get();
            // $loanTenure =Arr::pluck($getTenure, 'max_duration');
            // $maxTenure = implode(" ",$loanTenure); 

            $rateType = DB::table('loan_settings')
            ->select('rate_type')
            ->where('cooperative_code', $code)
            ->pluck('rate_type')->first();

            $percentageRate =  DB::table('loan_settings')
            ->select('percentage_rate')
            ->where('cooperative_code', $code)
            ->pluck('percentage_rate')->first();

            $maxTenure =  DB::table('loan_settings')
            ->select('max_duration')
            ->where('cooperative_code', $code)
            ->pluck('max_duration')->first();

             
            $principal = (int)$amount;
            $percentage = $principal / 100 * $percentageRate ;
            $annualInterest = $percentage * $maxTenure; //for flat rate interest type
            $totalDue = $principal +   $annualInterest;//for flat rate interest type
            
            return view('loan.cooperative.create-loan', compact('memberName', 'members', 'memberID', 'chooseLoanType', 'loanType',
            'principal', 'maxTenure',  'percentage', 'annualInterest', 'totalDue',
            'rateType', 'duration', 'chooseLoanTypeName', 'chooseLoanTypeID', 'loanTypeID'));
        }
        else{ return Redirect::to('/login');} 
    }
    public function requestedLoan(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $id = Auth::user()->id;
            $code = Auth::user()->code;
            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');

            $loan = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
            ->join('loan_type', 'loan_type.name', '=', 'loan.loan_type')
             ->select(['loan.*', 'loan_type.name', 'users.fname'])
             ->where('loan.cooperative_code', $code)
             ->where('loan.loan_status', 'request')
             ->orderBy('loan.created_at', 'desc')
             ->where(function ($query) use ($search) {  // <<<
             $query->where('users.fname', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.principal', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.interest', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.total', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.duration', 'LIKE', '%'.$search.'%')
                      ->orWhere('loan.loan_status', 'LIKE', '%'.$search.'%')
                     ->orWhere('loan_type.name', 'LIKE', '%'.$search.'%')
                    ->orderBy('loan.created_at', 'desc');
            })->paginate($perPage, $columns = ['*'], $pageName = 'loan'
            )->appends(['per_page'   => $perPage]);
        
            $pagination = $loan->appends ( array ('search' => $search) );
                if (count ( $pagination ) > 0){
                    return view ('loan.cooperative.requested-loans' ,  compact(
                    'perPage', 'loan'))->withDetails( $pagination );     
                } 
                else{redirect()->back()->with('loanRequest-status', 'No record order found'); }   
            \LogActivity::addToLog('Admin loanRequest'); 

            return view('loan.cooperative.requested-loans', compact('perPage', 'loan'));
        }
        else{ return Redirect::to('/login');} 
    }

    public function approvedLoan(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $id = Auth::user()->id;
            $code = Auth::user()->code;
            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');

            $loan = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
            ->join('loan_type', 'loan_type.name', '=', 'loan.loan_type')
             ->select(['loan.*', 'loan_type.name', 'users.fname'])
             ->where('loan.cooperative_code', $code)
             ->where('loan.loan_status', 'approved')
             ->orderBy('loan.created_at', 'desc')
             ->where(function ($query) use ($search) {  // <<<
             $query->where('users.fname', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.principal', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.interest', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.total', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.duration', 'LIKE', '%'.$search.'%')
                      ->orWhere('loan.loan_status', 'LIKE', '%'.$search.'%')
                     ->orWhere('loan_type.name', 'LIKE', '%'.$search.'%')
                    ->orderBy('loan.created_at', 'desc');
            })->paginate($perPage, $columns = ['*'], $pageName = 'loan'
            )->appends(['per_page'   => $perPage]);
        
            $pagination = $loan->appends ( array ('search' => $search) );
                if (count ( $pagination ) > 0){
                    return view ('loan.cooperative.approved-loans' ,  compact(
                    'perPage', 'loan'))->withDetails( $pagination );     
                } 
                else{redirect()->back()->with('approvedLoan-status', 'No record order found'); }   
            \LogActivity::addToLog('Admin loanApproved'); 

            return view('loan.cooperative.approved-loans', compact('perPage', 'loan'));
        }
        else{ return Redirect::to('/login');} 
    }

    public function payOutLoan(Request $request){
        if(Auth::user()->role_name == 'cooperative'){
            $id = Auth::user()->id;
            $code = Auth::user()->code;
            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');

            $loan = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
            ->join('loan_type', 'loan_type.name', '=', 'loan.loan_type')
             ->select(['loan.*', 'loan_type.name', 'users.fname'])
             ->where('loan.cooperative_code', $code)
             ->where('loan.loan_status', 'payout')
             ->orderBy('loan.created_at', 'desc')
             ->where(function ($query) use ($search) {  // <<<
             $query->where('users.fname', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.principal', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.interest', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.total', 'LIKE', '%'.$search.'%')
                    ->orWhere('loan.duration', 'LIKE', '%'.$search.'%')
                      ->orWhere('loan.loan_status', 'LIKE', '%'.$search.'%')
                     ->orWhere('loan_type.name', 'LIKE', '%'.$search.'%')
                    ->orderBy('loan.created_at', 'desc');
            })->paginate($perPage, $columns = ['*'], $pageName = 'loan'
            )->appends(['per_page'   => $perPage]);
        
            $pagination = $loan->appends ( array ('search' => $search) );
                if (count ( $pagination ) > 0){
                    return view ('loan.cooperative.payout-loans' ,  compact(
                    'perPage', 'loan'))->withDetails( $pagination );     
                } 
                else{redirect()->back()->with('payOutLoan-status', 'No record order found'); }   
            \LogActivity::addToLog('Admin loanPayOut'); 

            return view('loan.cooperative.payout-loans', compact('perPage', 'loan'));
        }
        else{ return Redirect::to('/login');} 
    }

        public function editLoanType(Request $request, $id){
            if(Auth::user()->role_name == 'cooperative'){
                $loantype = LoanType::find($id);
                return view('loan.cooperative.edit-loantype', compact('loantype')); 
            }
              else { return Redirect::to('/login');
            }
      }
      
          public function updateLoanType(Request $request, $id){
            if(Auth::user()->role_name == 'cooperative'){
                $this->validate($request, [
                'rate_type'           => 'required|max:255',  
                'percentage_rate'     => 'required|max:255',  
                'mininum_duration'    => 'required|max:255',
                'maximum_duration'    => 'required|max:255',
                'guarantor'           => 'max:255',
                'description'         => 'max:255',
                'loantype'            => 'max:255',
                ]);
            
              $loantype = LoanType::find($id);
              $loantype->rate_type          = $request->rate_type;
              $loantype->percentage_rate    = $request->percentage_rate;
              $loantype->min_duration       = $request->mininum_duration;
              $loantype->max_duration       = $request->maximum_duration;
              $loantype->guarantor          = $request->guarantor;
              $loantype->description        = $request->description;
              $loantype->update();
      
              $data = 'Edit successful for ' .$request->loantype. '';
              \LogActivity::addToLog('loanType Update');
              return redirect('cooperative-loan-type')->with('success',  $data);
            }
            else { return Redirect::to('/login');}  
            }
    
    
          public function removeLoanTypePage(Request $request, $id){
            if(Auth::user()->role_name == 'cooperative'){
              $loantype = LoanType::find($id);
              return view('loan.cooperative.remove-loantype', compact('loantype')); 
           }
            else { return Redirect::to('/login');}   
          }
      
          public function removeAdminLoanType(Request $request){
            if(Auth::user()->role_name == 'cooperative'){
                $admin_id = Auth::user()->id;
                $id = $request->id;
                //soft delete
                LoanType::where('id', $id)->where('admin_id', $admin_id)->delete(); 
            
                \LogActivity::addToLog('Remove loanType');
                return redirect('cooperative-loan-type')->with('success', 'LoanType Removed Successful!');
            }
            else { return Redirect::to('/login');}  
        }

        public function adminDueLoans(Request $request){
            if(Auth::user()->role_name == 'cooperative'){
                $admin_id = Auth::user()->id;
                $code = Auth::user()->code;
               $totalMonthlyDueLoan =  LoanRepayment::join('loan', 'loan.id', '=', 'loan_repayment.loan_id')
               ->select('loan_repayment.monthly_due')
                ->where('loan.loan_status', 'payout')
                ->where('loan.cooperative_code', $code)
                 ->whereMonth('loan_repayment.next_due_date', Carbon::now()->month)
                ->whereYear('loan_repayment.updated_at', Carbon::now()->year);
            
                $perPage = $request->perPage ?? 10;
                $search = $request->input('search');
                $loan = DB::table('loan')->join('users', 'users.id', '=', 'loan.member_id')
                ->join('due_loans', 'due_loans.loan_id', '=', 'loan.id')
                ->join('loan_type', 'loan_type.name', '=', 'loan.loan_type')
                ->select([ 'loan.*', 
                'due_loans.monthly_due',
                'due_loans.due_date', 
                'loan_type.name', 
                'users.fname'])
               ->where('due_loans.payment_status', 'pending')
                ->where('due_loans.cooperative_code', $code)
                ->orderBy('loan.created_at', 'desc')
                ->where(function ($query) use ($search) {  // <<<
                $query->where('users.fname', 'LIKE', '%'.$search.'%')
                       ->orWhere('due_loans.monthly_due', 'LIKE', '%'.$search.'%')
                       ->orWhere('due_loans.due_date', 'LIKE', '%'.$search.'%')
                       ->orWhere('loan.duration', 'LIKE', '%'.$search.'%')
                        ->orWhere('loan_type.name', 'LIKE', '%'.$search.'%')
                       ->orderBy('loan.created_at', 'desc');
                })->paginate($perPage, $columns = ['*'], $pageName = 'loan'
                )->appends(['per_page'   => $perPage]);
            
                $pagination = $loan->appends ( array ('search' => $search) );
                    if (count ( $pagination ) > 0){
                        return view ('loan.cooperative.due-loans' ,  compact(
                        'perPage', 'loan', 'totalMonthlyDueLoan'))->withDetails( $pagination );     
                    } 
                    else{
                        redirect()->back()->with('due-status', 'No record order found'); 
                    }   
            
                \LogActivity::addToLog('Admin DueLoans');
                return view('loan.cooperative.due-loans', compact('perPage', 'loan', 'totalMonthlyDueLoan'));
            }
            else { return Redirect::to('/login');}  
        }
        
    
}//class