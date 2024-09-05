<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\About;
use App\Models\Privacy;
use App\Models\ReturnRefund; 
use App\Models\Terms;
use App\Models\FundRequest;
use App\Notifications\NewCardPayment;
use App\Notifications\ApproveFund;
use App\Notifications\CancelFundRequest;
use App\Mail\PasswordResetEmail;
use App\Models\FcmgOrder;
use App\Models\FcmgOrderItem;
use App\Models\FcmgProduct;
use App\Mail\PaymentEmail;
use App\Mail\ConfirmPaymentEmail;
use App\Mail\ConfirmOrderEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;

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


class SuperAdminController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('superadmin');
    }

    public function index(Request $request){
      if( Auth::user()->role_name  == 'superadmin'){
      // select all user except the current login
        $users = User::all()->except(Auth::id());
        $id = Auth::user()->id;

        $cooperatives = User::where('role', '2')
        ->where('deleted_at',   NULL)
        ->get(['users.*']);
        $sellers = User::where('role', '3')
        ->where('deleted_at',   NULL)
        ->get(['users.*']);
        $members = User::where('role', '4')
        ->where('deleted_at',   NULL)
        ->where('role_name', '!=', 'cooperative')
        ->get(['users.*']);
        $fmcg = User::where('role', '33')
        ->where('deleted_at',   NULL)
        ->get(['users.*']);

        $activeUser =  User::where('last_login', '>', new DateTime('last day of previous month'))
        ->get();

        $count_orders = Order::all()
        ->where('status', '!=', 'awaits approval')
        ->where('status', '!=', 'cancel');
        $count_sales = Order::where('orders.pay_status', 'success');

        $countProductSold = DB::table('order_items')
        ->join('orders', 'orders.id', 'order_items.order_id')
        ->where('orders.pay_status', 'success')
        ->sum('order_items.order_quantity');

        $sumSales = Order::where('orders.pay_status', 'success')->get('grandtotal');

        $offlinePayment = Order::where('pay_type', '=', 'Offline');
        $onlinePayment =Order::where('pay_type', '=', 'Debit Card');
        $bankPayment =Order::where('pay_type', '=', 'Bank Transfer');

        $onlinePayment = Transaction::join('users', 'users.id', '=', 'transactions.user_id')
        ->get('tran_amount');

        $products = Product::where('deleted_at', null)
        ->where('prod_status',   'approve')
        ->get('*'); 

        $fmcgProducts = FcmgProduct::where('deleted_at', null)
        ->where('prod_status',   'approve')
        ->get('*'); 
        $funds = User::join('fund_request', 'fund_request.user_id', '=', 'users.id')
        ->where('fund_request.status', 'approve');

        $registeredUsers = User::select(
        \DB::raw("COUNT(*) as total_user"), 
        \DB::raw('YEAR(created_at) as year'),
        )
        ->where('role', '!=', '1')
        ->groupby('year')
        ->get();

        $result[] = ['Year', 'Users'];
        foreach ($registeredUsers as $key => $value) {
        $result[++$key] = [$value->year,  (int)$value->total_user ];
        }

        //wallet account
        $activeWallet = Wallet::where('last_transation_date', null)->get();
    
        
        $salesChart = Order::select(
          \DB::raw("COUNT(*) as total_sales"),
          \DB::raw('YEAR(created_at) as year')
          )
          ->where('pay_status', 'success')
          ->groupby('year')
          ->get();
  
          $sales[] = ['Sales', 'Other'];
          foreach ($salesChart as $key => $value) {
          $sales[++$key] = ["Sales", $value->year];
          $sales[++$key] = ["Other", (int)$value->total_sales];
          }
          \LogActivity::addToLog('SuperAdmin');
        return view('company.admin', compact('sales', 'funds','cooperatives', 'sellers', 'members', 
        'count_orders', 'count_sales',  'products', 'users', 
        'onlinePayment', 'sumSales', 'countProductSold', 
        'onlinePayment', 'bankPayment', 'fmcg', 'fmcgProducts', 'activeUser'))->with('registeredUsers',json_encode($result));
    }
    else { return Redirect::to('/login');}
   
    }

    public function orderHistory(Request $request){

      $perPage = $request->perPage ?? 10;
      $search = $request->input('search');
      $orders =Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
      ->join('users', 'users.id', '=', 'orders.user_id')//get the customer details
      ->where('orders.status', '!=', 'cancel')
       ->orderBy('orders.date', 'desc')
       ->where(function ($query) use ($search) {  // <<<
      $query->where('users.fname', 'LIKE', '%'.$search.'%')
          ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.order_number', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.grandtotal', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.date', 'LIKE', '%'.$search.'%')
          ->orWhere('orders.status', 'LIKE', '%'.$search.'%')
          ->orderBy('orders.created_at', 'desc');
       })->paginate($perPage, $columns = ['*'], $pageName = 'orders'
       )->appends([
      'per_page'   => $perPage
       ]);
       $pagination = $orders->appends ( array ('search' => $search) );
      if (count ( $pagination ) > 0){
          return view('company.order-history', compact('perPage','orders'))->withDetails ( $pagination );     
           } 
           else{
               redirect()->back()->with('status', 'No customer order found'); 
           }
           \LogActivity::addToLog('SuperAdmin orderHistory'); 
        return view('company.order-history', compact('perPage','orders'));
    }
 
    public function allocateFund(Request $request)
    {  
        // if(null !== $_POST['submit']){
            $admin_id = Auth::user()->id;
            $user_id  = $request->input('user_id');
            $id       = $request->id;
            $status   = $request->input('status');
            $remark   = $request->input('remark');
            $amount   = $request->input('amount');
            $member   = User::where('id', $user_id)->first();

                // check if user is verified
                $verified = \DB::table('users')->where('id', $user_id)->first()->email_verified_at;
                if($verified){ 
                  \DB::table('fund_request')->where('id', $id)
                  ->update([
                    'status' => $status,
                    'remark' => $remark
                    ]);
                      //increase user credit limit
                      \DB::table('vouchers')->where('user_id', $user_id)->increment('credit',$amount);
                      Session::flash('credit', ' Fund Allocated successfully!'); 
                      Session::flash('alert-class', 'alert-success'); 

                      $getUser = User::where('id', $user_id)
                      ->get('id');
              
                      $getFundID = FundRequest::where('id', $id)->get();
                      $fundID= Arr::pluck($getFundID, 'id'); // 
                      $fund_id = $id;

                      $getCredit = \DB::table('vouchers')->where('user_id', $user_id)->get('credit');
                      $arrayCredit = Arr::pluck($getCredit, 'credit');
                      $credit = implode('', $arrayCredit);

                      $notification = new ApproveFund($fund_id, $amount, $credit);
                      Notification::send($getUser, $notification);
                      \LogActivity::addToLog('SuperAdmin addFunds');
                      return redirect()->back()->with('credit', 'Fund Allocated successfully!');
            
                }
              else{
                    Session::flash('verified', 'Credit not added. This member has not verified his/her account.'); 
                    Session::flash('alert-class', 'alert-danger'); 
                    return redirect()->back()->with('credit', 'Credit not added. This member has not verified his/her account.');
              }
          // } 
           

  }

    public function fundsAllocated(Request $request){
      $id = Auth::user()->id;
      $funds = User::join('fund_request', 'fund_request.user_id', '=', 'users.id')
      ->where('fund_request.status', 'approve')
      ->where('fund_request.admin_id', $id)// funds approve by superadmin only

      ->paginate( $request->get('per_page', 5));
      \LogActivity::addToLog('SuperAdmin fundsAllocated');
      return view('company.funds-allocated', compact('funds'));
    }

    public function editFundRequest($id)
    {
        $fund = FundRequest::find($id);
        $user = User::where('id', $fund->user_id)->get('email');
        $array = Arr::pluck($user,'email' );
        $userEmail = implode(",", $array);
        \LogActivity::addToLog('Cancel fundRequest');
        return view('cancel-fund-request', compact('fund', 'userEmail'));
    }

    public function cancelFundRequest(Request $request){
        $cancel = 'cancel';
        $remark = $request->remark;
        $fund_id = $request->id;
        $amount = $request->amount;
        FundRequest::where('id', $fund_id)
        ->update([
        'status' => $cancel,
        'remark' => $remark
        ]); 
        $getUser = User::join('fund_request', 'fund_request.user_id', '=', 'users.id')
        ->where('fund_request.id', $fund_id)
        ->get('users.id');

        $getFundRequest = FundRequest::where('id', $fund_id)->get();
        $FundRequest= Arr::pluck($getFundRequest, 'fund_id'); // 
        $order_number = implode('', $FundRequest);
     
        $notification = new CancelFundRequest($fund_id, $amount, $remark);
        Notification::send($getUser, $notification);
        \LogActivity::addToLog('Cancel fundRequest');

        return redirect('show-fundrequest')->with('success', 'Fund Request Canceled!');
    } 

    public function sales_invoice(Request $request, $order_number )
    {
     if( Auth::user()->role_name  == 'superadmin'){
     
        $item = Order::join('users', 'users.id', '=', 'orders.user_id')// count orders from members
        ->join('order_items', 'order_items.order_id', '=', 'orders.id')
        // ->join('shipping_details', 'shipping_details.shipping_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        // ->join('vouchers', 'vouchers.user_id', '=', 'users.id')
        ->where('orders.order_number', $order_number)
        ->get([ 'orders.*', 'users.*', 'order_items.*', 'products.*'])->first();

        $orders = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->where('orders.order_number', $order_number)
        ->get(['orders.*',  'order_items.*',  'products.*']); 
        \LogActivity::addToLog('SuperAdmin userInvoice'); 
    return view('company.sales_invoice', compact('item', 'orders'));
           }

    else { return Redirect::to('/login');
    
        }             
    }


 public function order_details(Request $request, $order_number )
    {
     if( Auth::user()->role_name  == 'superadmin'){
      // 
         $orders = Product::join('order_items', 'order_items.product_id', '=', 'products.id')
         ->join('users', 'users.id', '=', 'products.seller_id')          
         ->join('orders', 'orders.id', '=', 'order_items.order_id')
          ->where('orders.order_number', $order_number)
          ->orderBy('orders.date', 'desc')
                        // ->get(['orders.*', 'users.*', 'order_items.*', 'products.*']);
          ->paginate( $request->get('per_page', 5)); 
          \LogActivity::addToLog('SuperAdmin orderDetails');
    return view('company.order_details', compact('orders'));
           }

    else { return Redirect::to('/login');
    
        }             
    }


    public function salesDetails(Request $request )
    {
     if( Auth::user()->role_name  == 'superadmin'){
        $count_sales = Order::where('orders.pay_status', 'success');
        $sales = Product::join('order_items', 'order_items.product_id', '=', 'products.id')
        ->join('users', 'users.id', '=', 'products.seller_id')          
        ->join('orders', 'orders.id', '=', 'order_items.order_id')
        ->where('orders.pay_status', 'success')
        ->orderBy('orders.date', 'desc')
        ->paginate( $request->get('per_page', 5)); 
        $grandtotal = Order::where('orders.pay_status', 'success')->get('grandtotal');
        $total = Order::where('orders.pay_status', 'success')->get('total');
        \LogActivity::addToLog('SuperAdmin salesDetails');
    return view('company.sales-details', compact('sales', 'grandtotal', 'total'));
           }

    else { return Redirect::to('/login');
    
        }             
    }
  
   public function products_list(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
             
        // count products from vendors
        $count_product = User::join('products', 'products.seller_id', '=', 'users.id')
        ->where('products.prod_status', 'pending')
        ->orwhere('products.prod_status', 'approve');

        $perPage = $request->perPage ?? 10;
        $search = $request->input('search');
        
        $products=  User::join('products', 'products.seller_id', '=', 'users.id')
        ->where('products.prod_status', '!=', 'remove')
        ->where('products.deleted_at', null)
        ->orderBy('products.created_at', 'desc') 
        ->select(['products.*', 'users.fname', 'users.lname', 'users.coopname'])
        ->where(function ($query) use ($search) {  // <<<
        $query->where('products.prod_name', 'LIKE', '%'.$search.'%');
        })
        ->paginate($perPage,  $pageName = 'products')->appends(['per_page'   => $perPage]);
        $pagination = $products->appends ( array ('search' => $search) );
            if (count ( $pagination ) > 0){
                return view('company.products_list',  compact(
                'perPage', 'products', 'count_product'))->withDetails( $pagination );     
            } 


        \LogActivity::addToLog('SuperAdmin productList');

       return view('company.products_list', compact('perPage',  'products', 'count_product'));

       }

    else { return Redirect::to('/login');} 
   
    }

    public function fmcgProductsList(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
             
        // count products from vendors
        $count_product = User::join('fmcg_products', 'fmcg_products.seller_id', '=', 'users.id')
        ->where('fmcg_products.prod_status', 'pending')
        ->orwhere('fmcg_products.prod_status', 'approve');

        $perPage = $request->perPage ?? 10;
        $search = $request->input('search');
        
        $products=  User::join('fmcg_products', 'fmcg_products.seller_id', '=', 'users.id')
        ->where('fmcg_products.prod_status', '!=', 'remove')
        ->where('fmcg_products.deleted_at', null)
        ->orderBy('fmcg_products.created_at', 'desc') 
        ->select(['fmcg_products.*', 'users.fname', 'users.lname', 'users.coopname'])
        ->where(function ($query) use ($search) {  // <<<
        $query->where('fmcg_products.prod_name', 'LIKE', '%'.$search.'%');
        })
        ->paginate($perPage,  $pageName = 'products')->appends(['per_page'   => $perPage]);
        $pagination = $products->appends ( array ('search' => $search) );
            if (count ( $pagination ) > 0){
                return view('company.fmcg-products-list',  compact(
                'perPage', 'products', 'count_product'))->withDetails( $pagination );     
            } 


        \LogActivity::addToLog('SuperAdmin FmcgProductList');

       return view('company.fmcg-products-list', compact('perPage',  'products', 'count_product'));

       }

    else { return Redirect::to('/login');} 
   
    }

    //edit Vendor product
  public function editVendorProduct(Request $request, $id){
    if( Auth::user()->role_name  == 'superadmin'){
        $product = Product::find($id);
        return view('company.edit-vendor-product', compact('product')); 
     }
      else { return Redirect::to('/login');
    }
} 


public function editFmcgProduct(Request $request, $id){
  if( Auth::user()->role_name  == 'superadmin'){
      $product = FcmgProduct::find($id);
      return view('company.edit-fmcg-product', compact('product')); 
   }
    else { return Redirect::to('/login');
  }
} 

    //update product
    public function updateFmcgProduct(Request $request, $id){
      $this->validate($request, [
        'quantity'      => 'required|max:255',  
        'old_price'    => 'max:255',
        'price'        => 'required|max:255',
        'productname'  => 'required|max:255',
        'brand'        => 'max:255',
        'description'  => 'max:255',
        ]);
        // add company and coperative percentage
        $company_percentage = $request->price *  5 / 100;
        $price = $request->price  + $company_percentage;

        $product = FcmgProduct::find($id);
        $product->prod_name     = $request->productname;
        $product->quantity      = $request->quantity;
        $product->old_price     = $request->old_price;
        $product->seller_price  = $request->price;
        $product->price         = $price;
        $product->prod_brand     = $request->brand;
        $product->description     = $request->description;
        $product->update();

        $data = 'Edit successful for ' .$request->productname. '';
        \LogActivity::addToLog('ProductUpdate');
        return redirect('fmcg-products-list')->with('success',  $data);
    }


    public function mark_paid(Request $request)
    {
        if(null !== $_POST['submit']){
            $order_number  = $request->input('order_number');
             //mark order as paid
            \DB::table('orders')->where('order_number', $order_number)
              ->update([
                    'status' => 'paid',
                    'pay_status'=>'success',
                    'pay_type'=>'Offline' ,
                    'admin_settlement_msg' => 'paid'
              ]);

                //$order_number = Order::where('order_number', $order_number)->get('order_number');
                $order_id = Order::where('order_number', $order_number)->get('id');
                $ord=Arr::pluck($order_id, 'id');

                $orderItems = OrderItem::where('order_id', $ord)->get();
                foreach($orderItems as $item){
                  $seller_id=Arr::pluck($orderItems, 'seller_id');
                  $product_id=Arr::pluck($orderItems, 'product_id');
                  $getPrice = Product::where('id', $product_id)->get();
                  $getSellerPrice = Arr::pluck($getPrice, 'seller_price');
                  $sellerPrice = implode('', $getSellerPrice);

                  $seller =  User::where('id', $seller_id)
                  ->get('id');
                //for every new order decrease product quantity
                $itemQuantity = Arr::pluck($orderItems, 'order_quantity');
                $quantity = implode('', $itemQuantity);

                $stock = \DB::table('products')->where('id', $product_id)->first()->quantity;        
                if($stock > $quantity){
                    \DB::table('products')->where('id', $product_id)->decrement('quantity',$quantity);
                }
                $notification = new NewCardPayment($order_number);
                Notification::send($seller, $notification); 
                Wallet::where('user_id', $seller_id)->increment('credit',$sellerPrice);
              }
          
            Session::flash('pay', ' You have marked this orders as  "Paid !".'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        \LogActivity::addToLog('SuperAdmin markPaid');
           return redirect()->back()->with('success', 'You have marked this orders as  "Paid !".');
    }

    public function confirmOrder(Request $request)
    {
        if(null !== $_POST['submit']){
            $order_number  = $request->input('order_number');
             //mark order as paid
            \DB::table('orders')
                ->where('order_number', $order_number)
                ->update([
                    'status' => 'confirmed',
                ]);

            Session::flash('confirm', ' Order Confirmed! .'); 
            Session::flash('alert-class', 'alert-success'); 
        }
           return redirect()->back()->with('success', 'Order Confirmed!.');
    }


  public function approved(Request $request)
  {
        if(null !== $_POST['submit']){
            $id  = $request->input('id');
             //mark order as paid
            \DB::table('products')
                ->where('id', $id)
                ->update(['prod_status' => 'approve']);

            Session::flash('approve', ' Product approved successful!.'); 
            Session::flash('alert-class', 'alert-success'); 
        }
            //return view('cooperative.credit_limit', compact('credit'));
            \LogActivity::addToLog('Approve product');
             return redirect()->back()->with('success', 'Product approved successful!..');
}

public function allVendors(Request $request){
  $adminActiveUser =  User::where('role', '3')
  ->where('last_login', '>', new DateTime('last day of previous month'))
  ->get();
  $perPage = $request->perPage ?? 12;
  $search = $request->input('search');

   $users =  User::where('role', '3')
   ->where('deleted_at',   NULL)
   ->orderBy('created_at', 'desc')
  ->where(function ($query) use ($search) {  // <<<
  $query->where('users.fname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.email', 'LIKE', '%'.$search.'%')
  ->orWhere('users.phone', 'LIKE', '%'.$search.'%')
  ->orderBy('users.created_at', 'desc');
  })->paginate($perPage, $columns = ['*'], $pageName = 'members'
  )->appends(['per_page'   => $perPage]);

  $pagination = $users->appends ( array ('search' => $search) );
  if (count ( $pagination ) > 0){
      return view ('company.vendor-list', compact(
      'perPage',
      'users',
      'adminActiveUser'))->withDetails($pagination );    
  }
  else{
      redirect()->back()->with('users-status', 'No record found'); 
  } 
  \LogActivity::addToLog('SuperAdmin VendorList');
  return view('company.vendor-list', compact(  'perPage', 'users', 'adminActiveUser'));

}

public function eachVendorProduct(Request $request, $id){
  $storeName =  User::where('id', $id)
  ->get()->pluck('coopname')->first();

  $soldProduct = Order::join('order_items', 'order_items.order_id', 'orders.id')
  ->where('order_items.seller_id', $id)
  ->where('orders.status', 'paid')
  ->get();

  $countProduct = Product::where('seller_id', $id)
  // ->where('prod_status',   'approve')
  ->where('deleted_at',   NULL)
  ->get();

  $perPage = $request->perPage ?? 12;
  $search = $request->input('search');

   $products =  Product::where('seller_id', $id)
   ->where('deleted_at',   NULL)
   ->orderBy('created_at', 'desc')
  ->where(function ($query) use ($search) {  // <<<
  $query->where('products.prod_name', 'LIKE', '%'.$search.'%')
  ->orWhere('products.prod_status', 'LIKE', '%'.$search.'%')
  ->orderBy('users.created_at', 'desc');
  })->paginate($perPage, $columns = ['*'], $pageName = 'products'
  )->appends(['per_page'   => $perPage]);

  $pagination = $products->appends ( array ('search' => $search) );
  if (count ( $pagination ) > 0){
      return view ('company.vendor-store', compact(
      'perPage',
      'products',
      'soldProduct', 'storeName', 'countProduct'))->withDetails($pagination );    
  }
  else{
      redirect()->back()->with('users-status', 'No record found'); 
  } 
  \LogActivity::addToLog('SuperAdmin Fmcgist');
  return view('company.vendor-store', compact('perPage', 'products', 
  'soldProduct', 'storeName', 'countProduct'));

}

public function allFMCG(Request $request){
  $adminActiveUser =  User::where('role', '33')
  ->where('last_login', '>', new DateTime('last day of previous month'))
  ->get();

  $perPage = $request->perPage ?? 12;
  $search = $request->input('search');

   $users =  User::where('role', '33')
   ->where('deleted_at',   NULL)
   ->orderBy('created_at', 'desc')
  ->where(function ($query) use ($search) {  // <<<
  $query->where('users.fname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.email', 'LIKE', '%'.$search.'%')
  ->orWhere('users.phone', 'LIKE', '%'.$search.'%')
  ->orderBy('users.created_at', 'desc');
  })->paginate($perPage, $columns = ['*'], $pageName = 'members'
  )->appends(['per_page'   => $perPage]);

  $pagination = $users->appends ( array ('search' => $search) );
  if (count ( $pagination ) > 0){
      return view ('company.fmcg-list', compact(
      'perPage',
      'users',
      'adminActiveUser'))->withDetails($pagination );    
  }
  else{
      redirect()->back()->with('users-status', 'No record found'); 
  } 
  \LogActivity::addToLog('SuperAdmin Fmcgist');
  return view('company.fmcg-list', compact(  'perPage', 'users', 'adminActiveUser'));

}

public function eachFMCGProduct(Request $request, $id){
  $storeName =  User::where('id', $id)
  ->get()->pluck('coopname')->first();

  $soldProduct = FcmgOrder::join('fmcgorder_items', 'fmcgorder_items.order_id', 'fmcgorders.id')
  ->where('fmcgorder_items.seller_id', $id)
  ->where('fmcgorders.status', 'paid')
  ->get();

  $countProduct = FcmgProduct::where('seller_id', $id)
  ->get();

  $perPage = $request->perPage ?? 12;
  $search = $request->input('search');

   $products =  FcmgProduct::where('seller_id', $id)
   ->where('deleted_at',   NULL)
   ->orderBy('created_at', 'desc')
  ->where(function ($query) use ($search) {  // <<<
  $query->where('fmcg_products.prod_name', 'LIKE', '%'.$search.'%')
  ->orWhere('fmcg_products.prod_status', 'LIKE', '%'.$search.'%')
  ->orderBy('users.created_at', 'desc');
  })->paginate($perPage, $columns = ['*'], $pageName = 'products'
  )->appends(['per_page'   => $perPage]);

  $pagination = $products->appends ( array ('search' => $search) );
  if (count ( $pagination ) > 0){
      return view ('company.fmcg-store', compact(
      'perPage',
      'products',
      'soldProduct', 'storeName', 'countProduct'))->withDetails($pagination );    
  }
  else{
      redirect()->back()->with('users-status', 'No record found'); 
  } 
  \LogActivity::addToLog('SuperAdmin Fmcgist');
  return view('company.fmcg-store', compact('perPage', 'products', 
  'soldProduct', 'storeName', 'countProduct'));

}

public function allCooperative(Request $request){
  $adminActiveUser =  User::where('role', '2')
  ->where('last_login', '>', new DateTime('last day of previous month'))
  ->get();
  $coopCode = User::where('role', '2')
  ->get(['code']);

  $perPage = $request->perPage ?? 12;
  $search = $request->input('search');

   $users =  DB::table('users')->where('role', '2')
   ->where('deleted_at',   NULL)
   ->select(['users.*'])
   ->orderBy('created_at', 'desc')
  ->where(function ($query) use ($search) {  // <<<
  $query->where('users.fname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.email', 'LIKE', '%'.$search.'%')
  ->orWhere('users.phone', 'LIKE', '%'.$search.'%')
  ->orderBy('users.created_at', 'desc');
  })->paginate($perPage, $columns = ['*'], $pageName = 'members'
  )->appends(['per_page'   => $perPage]);

  //dd($users);
  $pagination = $users->appends ( array ('search' => $search) );
  if (count ( $pagination ) > 0){
      return view ('company.cooperative-list', compact(
      'perPage',
      'users',
      'adminActiveUser'))->withDetails($pagination );    
  }
  else{
      redirect()->back()->with('users-status', 'No record found'); 
  } 
  \LogActivity::addToLog('SuperAdmin Fmcgist');
  return view('company.cooperative-list', compact(  'perPage', 'users', 'adminActiveUser'));

}

public function allCooperativeMembers(Request $request, $cooperative){
  $code =  User::where('id',   $cooperative)
  ->get('code')->pluck('code')->first();

  $adminActiveUser =  User::where('role_name', '!=', 'cooperative')
  ->where('code', $code)
  ->where('last_login', '>', new DateTime('last day of previous month'))
  ->get();

  $cooperativeName = User::where('code', $code)
  ->get(['coopname'])->pluck('coopname')->first();

  $perPage = $request->perPage ?? 12;
  $search = $request->input('search');

   $users =  User::where('role_name', '!=', 'cooperative')
   ->where('deleted_at',   NULL)
   ->where('code',   $code)
   ->orderBy('created_at', 'desc')
  ->where(function ($query) use ($search) {  // <<<
  $query->where('users.fname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
  ->orWhere('users.email', 'LIKE', '%'.$search.'%')
  ->orWhere('users.phone', 'LIKE', '%'.$search.'%')
  ->orderBy('users.created_at', 'desc');
  })->paginate($perPage, $columns = ['*'], $pageName = 'members'
  )->appends(['per_page'   => $perPage]);

  $pagination = $users->appends ( array ('search' => $search) );
  if (count ( $pagination ) > 0){
      return view ('company.cooperative-members', compact(
      'perPage',
      'users',
      'adminActiveUser', 'cooperativeName'))->withDetails($pagination );    
  }
  else{
      redirect()->back()->with('users-status', 'No record found'); 
  } 
  \LogActivity::addToLog('SuperAdmin Fmcgist');
  return view('company.cooperative-members', compact('perPage', 'users', 'adminActiveUser', 'cooperativeName'));

}

 public function users_list(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
          $coop = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')
          ->where('users.role', '2')
          ->where('users.deleted_at',   NULL)
          ->orderBy('users.created_at', 'desc')
          ->get();
          

        $members =   User::where('role', '4')
        ->where('deleted_at',  NULL)
        ->orderBy('created_at', 'desc')
        ->get();
        //fmcg
        $fmcg = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')
          ->where('users.role', '33')
          ->where('users.deleted_at',    NULL)
          ->orderBy('users.created_at', 'desc')
          ->get();  
        //sellers
        $merchants = User::where('role', '3')
        ->where('deleted_at',   NULL)
        ->orderBy('created_at', 'desc')
        ->get();
        \LogActivity::addToLog('SuperAdmin userList');
        return view('company.users_list', compact('coop', 'members', 'merchants', 'fmcg'));
 
       }

    else { return Redirect::to('/login');}
   
    }
  //edit 
  public function user_edit(Request $request, $id){
    if( Auth::user()->role  == '1'){
        $users = User::find($id);
        return view('company.user_edit', compact('users')); 
     }
      else { return Redirect::to('/login');
    }
}

//update 
public function user_update(Request $request, $id)
{
  $this->validate($request, [
    'fname'  => 'max:255',  
     'lname'  =>  'max:255',
     'coopname'    => 'max:255',
     'address' => 'max:255',
     'location' =>  'max:255',
     'bank'     =>  'max:255',
     'account_name' => 'max:255',
     'account_number' =>  'max:255',
    ]);

    $user = User::find($id);
    $user->fname = $request->fname;
    $user->lname = $request->lname;
    $user->coopname = $request->coopname;
    $user->address = $request->address;
    $user->location = $request->location;
    $user->bank = $request->bank;
    $user->account_name = $request->account_name;
    $user->account_number = $request->account_number;
    $user->update();
    $data = 'Update successful for ' .$user->fname. '';
    \LogActivity::addToLog('Update');
    return redirect()->back()->with('status',  $data);
}

public function resetUserPassword(Request $request, $id){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  $num = 8;
  for ($a = 0; $a < $num; $a++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
  }
  $tempoaryPassword = str_shuffle($randomString);
  $user = User::find($id);
  $user->password = Hash::make($tempoaryPassword);
  $user->password_reset_at = Carbon::now();
  $user->update();
  $msg = 'Password reset was successful!. A login code as been sent to:-> ' .$user->email ;
  
  $name =  \DB::table('users')->where('id', $id)->get('fname') ; 
  $username = Arr::pluck($name, 'fname'); // 
  $get_name = implode(" ",$username);

  $userEmail = \DB::table('users')->where('id', $id)->get('email') ; 
  $getEmail= Arr::pluck($userEmail, 'email'); // 
  $email = implode(" ",$getEmail);

  $data = array(
    'name'     => $get_name,
    'password' => $tempoaryPassword,        
    );
    //dd($data);
     Mail::to($email)->send(new PasswordResetEmail($data)); 
  \LogActivity::addToLog('Reset password'); 
  return redirect()->back()->with('status',  $msg);
}
 
 public function transactions(Request $request){
      if( Auth::user()->role_name  == 'superadmin'){
       //view all transactions by cooperatives
          $transactions = Transaction::join('users', 'users.id', '=', 'transactions.user_id')
                        ->leftjoin('order_items', 'order_items.order_id', '=', 'transactions.order_id')
                        ->where('users.role', '2')
                        ->orderBy('date', 'desc')
                        ->paginate( $request->get('per_page', 5));
                       //->get(['vouchers.*', 'users.*']);
        // }
        \LogActivity::addToLog('Transaction details');
       return view('company.transactions', compact('transactions'));

       }
    else { return Redirect::to('/login');
    }
   
  }


 public function about(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
        $about = About::all();
        return view('company.add_about', compact('about'));
      }

    else { return Redirect::to('/login');
    }
  }

  //edit 
 public function about_edit(Request $request, $id){
        if( Auth::user()->role  == '1'){
            $about = About::find($id);
            return view('company.about_edit', compact('about')); 
         }
          else { return Redirect::to('/login');
    }
    }

    //update 
public function about_update(Request $request, $id)
    {
        $about = About::find($id);
        $about->about = $request->input('about');
        $about->our_story = $request->input('our_story');
        $about->update();
        \LogActivity::addToLog('Update aboutUs');
        return redirect()->back()->with('status','About page updated');
    }

public function privacy(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
        $about = Privacy::all();
        return view('company.add_privacy_policy', compact('about'));
      }

    else { return Redirect::to('/login');
    }
  }

  //edit 
 public function privacy_edit(Request $request, $id){
        if( Auth::user()->role  == '1'){
            $about = Privacy::find($id);
            return view('company.privacy_edit', compact('about')); 
         }
          else { return Redirect::to('/login');
    }
    }

    //update 
    public function privacy_update(Request $request, $id)
    {
        $about = Privacy::find($id);
        $about->privacy_policy = $request->input('privacy');
        $about->update();
        \LogActivity::addToLog('Update privacyPolicy');
        return redirect()->back()->with('status','Privacy page updated');
    }


    public function refund(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
        $about = ReturnRefund::all();
        return view('company.add_refund_and_return_policy', compact('about'));
      }

    else { return Redirect::to('/login');
    }
  }

  //edit 
 public function refund_edit(Request $request, $id){
        if( Auth::user()->role  == '1'){
            $about = ReturnRefund::find($id);
            return view('company.refund_edit', compact('about')); 
         }
          else { return Redirect::to('/login');
    }
    }

    //update 
    public function refund_update(Request $request, $id)
    {
        $about = ReturnRefund::find($id);
        $about->return_policy = $request->input('return');
        $about->update();
        \LogActivity::addToLog('Update refundPolicy');
        return redirect()->back()->with('status','Reurn & Refund page updated');
    }


public function tandc(Request $request){
  
      if( Auth::user()->role_name  == 'superadmin'){
        $about = Terms::all();
        return view('company.add_terms_and_condition', compact('about'));
      }

    else { return Redirect::to('/login');
    }
  }

  //edit 
 public function tandc_edit(Request $request, $id){
        if( Auth::user()->role  == '1'){
            $about = Terms::find($id);
            return view('company.terms_edit', compact('about')); 
         }
          else { return Redirect::to('/login');
    }
    }

    //update 
    public function tandc_update(Request $request, $id)
    {
        $about = Terms::find($id);
        $about->terms_c = $request->input('terms_c');
        $about->update();
        \LogActivity::addToLog('Update TandC');
        return redirect()->back()->with('status','T & C page updated');
    }

    public function removeAllProduct(Request $request){
      $id = $request->product_id;
      //soft delete
      Product::where('id', $id)->update([
        'prod_status' =>  'deleted'
        ]);
      Product::where('id', $id)->delete(); 
   
      \LogActivity::addToLog('Remove product');
      return redirect()->back()->with('success', 'Product Removed Successful!');
  }


     public function removed_product(Request $request){
   
      if( Auth::user()->role_name  == 'superadmin'){
        $products = User::join('products', 'products.seller_id', '=', 'users.id')
                         ->where('products.prod_status', 'remove')
                        ->paginate( $request->get('per_page', 4));
                        \LogActivity::addToLog('Remove product');
        return view('company.removed_product', compact('products'));
      }

    else { return Redirect::to('/login');
    }
  }

  public function deleteUser(Request $request, $id )
  {
      $user = User::where('id', $id)->delete();
      \LogActivity::addToLog('SuperAdmin remove user');
      return redirect()->back()->with('success', 'User Removed Successfully!');
  }
  public function addNewAdmin(){
    return view('company.add-new-admin');
  }

  
  public function showSetPassword(Request $request){
    // $email = $email;
    return view('set-password');
}

public function setPassword(Request $request) {
    $validatedData = $request->validate([
        'email'        =>'required|email',
        'new-password' => 'required|string|min:8|confirmed',
    ]); 

    //Set Password   bcrypt();
    $user = User::where('email', $request->email)
    ->update(['password' => Hash::make($request->get('new-password'))]);
    if($user){
        \LogActivity::addToLog('Set password'); 
        return redirect('login')->with("success","You have successfully set your password!");
    }else{
        return redirect()->back()->with("success","Password Not Set!");
    } 
} 
}//class