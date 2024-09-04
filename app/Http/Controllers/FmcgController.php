<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Credit;
use App\Models\ShippingDetail;
use App\Models\Transaction;
use App\Models\Categories;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Mail\SendMail;
use App\Mail\OrderApprovedEmail;
use App\Mail\SalesEmail;
use App\Mail\OrderEmail;
use App\Mail\CooperativeWelcomeEmail;
use App\Notifications\AdminCancelOrder;
use App\Notifications\NewProduct;
use Carbon\Carbon;
use Auth;
use Validator;
use Session;
use Paystack;
use Storage;
use Mail;
use Notification;
use DateTime;


class FmcgController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('fmcg');   
    }
    public function index (Request $request){
        if( Auth::user()->role_name  == 'fmcg'){
          $code = Auth::user()->code; // get the code for the logedin fcmg
          $id = Auth::user()->id; //

          $firstTimeLoggedIn = Auth::user()->last_login;
          if (empty($firstTimeLoggedIn)) {
            $data = 
            array( 
              'user_id'   => Auth::user()->code,
              'coopname'  => Auth::user()->coopname,
              'email'     => Auth::user()->email,
          );
            Mail::to(Auth::user()->email)->send(new FmcgWelcomeEmail($data));  
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
  
          }
          elseif (!empty($firstTimeLoggedIn)) {
             $user = Auth::user();
             $user->last_login = Carbon::now();
             $user->save();
  
          }
         
            // check if user has field his/her profile
            $user=Auth::user();
            $phone          = $user->phone;
            $bank           = $user->bank;
            if($phone =='' && $bank ==''){
                Session::flash('profile', ' You are yet to complete your profile and bank details!'); 
                Session::flash('alert-class', 'alert-success'); 
                return Redirect::to('/account-settings');     
            }
        
            $credit = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')
            ->where('users.id', $id)->get('credit');;
            $members = User::all()->except(Auth::id())->where('code', $code); 
            
            $activeMember =  User::where('code', $code)
            ->where('id', '!=', Auth::user()->id)
            ->where('last_login', '>', new DateTime('last day of previous month'))
            ->get(); 

            $memberOrders = DB::table('users')->join('orders', 'orders.user_id', '=', 'users.id')
            ->select(['orders.*', 'users.fname', 'users.lname'])
            ->where('users.code', $code)
            ->where('orders.status', '!=', 'cancel')
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->orderBy('orders.created_at', 'desc');

             //sum all member order that is approve for payment
            $sumApproveOrder = User::join('orders', 'orders.user_id', '=', 'users.id')
            ->where('orders.status', 'approved') 
            ->where('users.code', $code) 
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->get('orders.*');  
            
            // for bulk payment 
            $all_orders_id = User::join('orders', 'orders.user_id', '=', 'users.id')
            ->where('orders.status', 'approve') 
            ->where('users.code', $code) 
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->get('orders.id');  

            $countProduct = User::join('fmcg_products', 'fmcg_products.seller_id', '=', 'users.id')
            ->where('fmcg_products.deleted_at',  null)
            ->where('fmcg_products.seller_id', $id);
                  
            $countApprovedProduct = User::join('fmcg_products', 'fmcg_products.seller_id', '=', 'users.id')
            ->where('fmcg_products.prod_status', 'approve')
            ->where('fmcg_products.seller_id', $id);
                  
            $countSoldProducts =  OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
            ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
            ->where('orders.status', 'paid')
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->where('order_items.seller_id', $id);
              
            $countPaidOrders = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
            ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
            ->where('orders.status', 'paid')
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->where('order_items.seller_id', $id);
                  
            $countShippedItem= OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
            ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
            ->where('order_items.delivery_status', 'delivered')
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->where('order_items.seller_id', $id);

            \LogActivity::addToLog('FMCG dashboard');
                  
            $perPage = $request->perPage ?? 10;
            $search = $request->input('search');
                  
            $sales = DB::table('order_items')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
            ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
            ->select(['orders.*','order_items.*','users.fname','users.phone',
            'fmcg_products.prod_name', 'fmcg_products.image','fmcg_products.seller_price'])
            ->where('orders.status', 'paid')
            ->where('orders.user_id', '!=', Auth::user()->id)
            ->where('order_items.seller_id', $id)
            ->orderBy('orders.created_at', 'desc')
            ->where(function ($query) use ($search) {  // <<<
            $query->where('users.fname', 'LIKE', '%'.$search.'%')
            ->orWhere('orders.order_number', 'LIKE', '%'.$search.'%')
            ->orWhere('orders.total', 'LIKE', '%'.$search.'%')
            ->orWhere('orders.grandtotal', 'LIKE', '%'.$search.'%')
            ->orWhere('orders.date', 'LIKE', '%'.$search.'%')
            ->orWhere('orders.status', 'LIKE', '%'.$search.'%')
            ->orderBy('orders.date', 'desc');
            })->paginate($perPage, $columns = ['*'], $pageName = 'sales')
            ->appends(['per_page'   => $perPage]);
            $pagination = $sales->appends ( array ('search' => $search) );
            if (count ( $pagination ) > 0){
                return view ('fmcg.fmcg' , compact('perPage', 'countProduct',
                'countApprovedProduct', 'countSoldProducts','sales', 
                'countPaidOrders',  'countShippedItem', 
                'activeMember'))->withDetails( $pagination );     
            } 
            else{ redirect()->back()->with('status', 'No sales record found'); }   
            
            return view('fmcg.fmcg', compact('perPage', 'countProduct', 
            'countApprovedProduct', 'countSoldProducts', 'sales',
            'countPaidOrders',  'countShippedItem',
             'activeMember'));
          }
          else { return Redirect::to('/login');}
    }


    public function fcmgNewProductPage(Request $request){
        if( Auth::user()->role_name  == 'fmcg'){
            $categories = Categories::all(); 
            return view('fmcg.add_new_product', compact('categories'));
          }
          else { return Redirect::to('/login');}
    }

    public function fcmgAddProductToStore(Request $request){   
      $user_id = Auth::user()->id; // get the seller id
      $user_role = Auth::user()->role;
      //|dimensions:max_width=600,max_height=600
       $this->validate($request, [
       'image' => 'required|image|mimes:jpg,png,jpeg|max:300',// maximum is 300kb , 600 x 600 pixel
       'img1' => 'image|mimes:jpg,png,jpeg|max:300',
       'img2' => 'image|mimes:jpg,png,jpeg|max:300',
       'img3' => 'image|mimes:jpg,png,jpeg|max:300',
       'img4' => 'image|mimes:jpg,png,jpeg|max:300',
       'prod_name' => 'required|string|max:100',
       'quantity' => 'required|string|max:100',
       'price' => 'required|string|max:100',
       'cat_id' => 'required|string|max:100',
      ]);
          $image= $request->file('image');
          if(isset($image)){
            $imageName =  rand(1000000000, 9999999999).'.jpeg';
            $image->move(public_path('images/products'),$imageName);
            $image_path = "/images/products/" . $imageName; 
          }else {$image_path = "";}

         $img1= $request->file('img1');
          if(isset($img1)){
            $img1Name =  rand(1000000000, 9999999999).'.jpeg';
            $img1->move(public_path('images/products'),$img1Name);
            $img1_path = "/images/products/" . $img1Name; 
           }else {$img1_path = "";}
          
          $img2= $request->file('img2');
          if(isset($img2)){
            $img2Name = rand(1000000000, 9999999999).'.jpeg';
            $img2->move(public_path('images/products'),$img2Name);
            $img2_path = "/images/products/" . $img2Name; 
          }else {$img2_path = "";}

          $img3= $request->file('img3');
          if(isset($img3)){
            $img3Name =  rand(1000000000, 9999999999).'.jpeg';
            $img3->move(public_path('images/products'),$img3Name);
            $img3_path = "/images/products/" . $img3Name; 
          }else {$img3_path = "";}

          $img4= $request->file('img4');
          if(isset($img4)){
            $img4Name = rand(1000000000, 9999999999).'.jpeg';
            $img4->move(public_path('images/products'),$img4Name);
            $img4_path = "/images/products/" . $img4Name; 
          }else {$img4_path = "";}

          $company_percentage = $request->price *  7 / 100;// coopmart percentage
          $price = $request->price  + $company_percentage;

         $fcmgproduct = new FcmgProduct;
         $fcmgproduct->cat_id    = $request->cat_id;
         $fcmgproduct->prod_name  = $request->prod_name;
         $fcmgproduct->quantity   = $request->quantity;
         $fcmgproduct->prod_brand = $request->prod_brand;
         $fcmgproduct->old_price  = $request->old_price;
         $fcmgproduct->seller_price = $request->price;
         $fcmgproduct->price      = $price;
         $fcmgproduct->description= $request->description;
         $fcmgproduct->image      = $image_path;
         $fcmgproduct->img1       = $img1_path;
         $fcmgproduct->img2       = $img2_path;
         $fcmgproduct->img3       = $img3_path;
         $fcmgproduct->img4       = $img4_path;
         $fcmgproduct->seller_id  = $user_id;
         $fcmgproduct->seller_role  = $user_role;
         $fcmgproduct->prod_status = 'pending';
         $fcmgproduct->save();
         // send email notification to Lascocomart for approval
          $data = array(
            'name'      =>  'Lascocomart',
            'message'   =>   'pending'
            );
           Mail::to('info@lascocomart.com')->send(new SendMail($data));
          return redirect('fcmg')->with('status', 'New product added successfully');             
  }   


    public function fmcgProducts(Request $request){
    if( Auth::user()->role_name  == 'fmcg'){
      $id = Auth::user()->id; 
      $countProduct =  DB::table('fmcg_products')
      ->where('fmcg_products.deleted_at',  null)
      ->where('seller_id', $id);

      $countApprovedProduct = User::join('fmcg_products', 'fmcg_products.seller_id', '=', 'users.id')
      ->where('fmcg_products.prod_status', 'approve')
      ->where('users.id', $id);

       $countSoldProducts =  OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
       ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
        ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
        ->where('orders.status', 'paid')
        ->where('orders.user_id', '!=', Auth::user()->id)
       ->where('order_items.seller_id', $id);

       $perPage = $request->perPage ?? 10;
       $search = $request->input('search');

      $products =  DB::table('fmcg_products')->select(['*'])
      ->where('fmcg_products.deleted_at',  null)
      ->where('seller_id', $id)
       ->orderBy('fmcg_products.created_at', 'desc')
       ->where(function ($query) use ($search) {  // <<<
      $query->where('fmcg_products.prod_name', 'LIKE', '%'.$search.'%')
          ->orWhere('fmcg_products.seller_price', 'LIKE', '%'.$search.'%')
          ->orWhere('fmcg_products.old_price', 'LIKE', '%'.$search.'%')
          ->orWhere('fmcg_products.prod_status', 'LIKE', '%'.$search.'%')
          ->orWhere('fmcg_products.created_at', 'LIKE', '%'.$search.'%')
          ->orWhere('fmcg_products.prod_brand', 'LIKE', '%'.$search.'%')
          ->orderBy('fmcg_products.created_at', 'desc');
       })->paginate($perPage, $columns = ['*'], $pageName = 'products')
       ->appends(['per_page'   => $perPage]);

       $pagination = $products->appends ( array ('search' => $search) );
        if (count ( $pagination ) > 0){
          return view ('fmcg.all_products', compact('perPage', 
          'countProduct','countApprovedProduct', 
          'countSoldProducts', 'products'))->withDetails ( $pagination );     
        } 
        else{ redirect()->back()->with('status', 'No record found'); }   
        \LogActivity::addToLog('FmcgAllProducts');
        return view('fmcg.all_products', compact('perPage', 
        'countProduct', 'countApprovedProduct', 
        'countSoldProducts','products'));
      }
      else { return Redirect::to('/login');}
    }
      

    public function removeProductPage(Request $request, $id){
      if( Auth::user()){
        $product = FcmgProduct::find($id);
        return view('fmcg.remove-product', compact('product')); 
     }
      else { return Redirect::to('/login');}   
    }

    public function removeProduct(Request $request){
      $seller_id = Auth::user()->id;
      $id = $request->product_id;
      //soft delete
      FcmgProduct::where('id', $id)->where('seller_id', $seller_id)->delete(); 
      FcmgProduct::where('id', $id)->update([
        'prod_status' =>  'deleted',
        ]);
      \LogActivity::addToLog('Remove product');
      return redirect('fmcg-products')->with('success', 'Product Removed Successful!');
  }

    public function editProduct(Request $request, $id){
      if( Auth::user()){
          $product = FcmgProduct::find($id);
          //dd($product->id);
          return view('fmcg.edit-product', compact('product')); 
      }
        else { return Redirect::to('/login');
      }
}

    public function updateProduct(Request $request, $id){
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
        return redirect('fmcg-products')->with('success',  $data);
    }

    public function fmcgSales(Request $request){
         if( Auth::user()->role_name  == 'fmcg'){
               $id = Auth::user()->id; //  
              $countPaidOrders = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
              ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
              ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
              ->where('orders.status', 'paid')
              ->where('orders.user_id', '!=', Auth::user()->id)
              ->where('order_items.seller_id', $id);

              $countSoldProducts = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
              ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
              ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
              ->where('orders.status', 'paid')
              ->where('orders.user_id', '!=', Auth::user()->id)
              ->where('order_items.seller_id', $id);

              $countShippedItem= OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
              ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
              ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
              ->where('order_items.delivery_status', 'delivered')
              ->where('orders.user_id', '!=', Auth::user()->id)
              ->where('order_items.seller_id', $id);

              $perPage = $request->perPage ?? 10;
              $search = $request->input('search');

               $sales = DB::table('order_items')
               ->join('orders', 'orders.id', '=', 'order_items.order_id')
               ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
                ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
               ->select([
                'orders.order_number',
                'orders.date',
                'orders.status',
                'orders.pay_type',
                'order_items.*',
                'users.fname', 
                'users.phone',
                'fmcg_products.prod_name',
                'fmcg_products.image',
                'fmcg_products.seller_price',
                ])
                ->where('orders.status', 'paid')
                ->where('orders.user_id', '!=', Auth::user()->id)
               ->where('order_items.seller_id', $id)
              
               ->where('orders.user_id', '!=', Auth::user()->id)
               ->orderBy('orders.created_at', 'desc')
               ->where(function ($query) use ($search) {  // <<<
              $query->where('users.fname', 'LIKE', '%'.$search.'%')
                  ->orWhere('orders.order_number', 'LIKE', '%'.$search.'%')
                  ->orWhere('orders.total', 'LIKE', '%'.$search.'%')
                  ->orWhere('orders.grandtotal', 'LIKE', '%'.$search.'%')
                  ->orWhere('orders.date', 'LIKE', '%'.$search.'%')
                  ->orWhere('orders.status', 'LIKE', '%'.$search.'%')
                  ->orderBy('orders.date', 'desc');
               })->paginate($perPage, $columns = ['*'], $pageName = 'sales')
               ->appends(['per_page'   => $perPage]);
       
               $pagination = $sales->appends ( array ('search' => $search) );
                   if (count ( $pagination ) > 0){
                    return view('fmcg.sales', compact(
                           'perPage', 'sales', 'countPaidOrders',
                           'countSoldProducts',
                           'countShippedItem'))->withDetails ( $pagination );     
                   } 
                   else{ redirect()->back()->with('status', 'No sales record found'); 
                   }  
              \LogActivity::addToLog('Sales');
              return view('fmcg.sales', compact('perPage', 'sales', 
              'countPaidOrders', 'countSoldProducts', 'countShippedItem'));
         }
         else{
            return Redirect::to('/login');
         } 
    }
 
    public function invoice(Request $request, $order_number ){ 
      if( Auth::user()->role_name  == 'fmcg'){
          $code = Auth::user()->code; //
          $id = Auth::user()->id;
          $item = Order::join('users', 'users.id', '=', 'orders.user_id')// count orders from members
          ->join('order_items', 'order_items.order_id', '=', 'orders.id')
          // ->join('shipping_details', 'shipping_details.shipping_id', '=', 'orders.id')
          ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
          // ->join('vouchers', 'vouchers.user_id', '=', 'users.id')
          ->where('fmcg_products.seller_id', $id) 
          ->where('orders.order_number', $order_number)
          ->get([ 'orders.*', 'users.*', 'order_items.*', 'fmcg_products.*'])->first();
       
          $orders = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
          ->join('fmcg_products', 'fmcg_products.id', '=', 'order_items.product_id')
          ->where('fmcg_products.seller_id', $id) 
          ->where('orders.order_number', $order_number)
          ->get(['orders.*',  'order_items.*',  'fmcg_products.*']); 
          \LogActivity::addToLog('Invoice');
          return view('invoice', compact('item', 'orders'));
      }
        else { return Redirect::to('/login');}
    }

    public function fmcgmembers(Request $request ){
      if( Auth::user()->role_name  == 'fmcg'){
          $code = Auth::user()->code; //
          $members = User::all()->except(Auth::id())->where('code', $code);
          
          $memberOrders = DB::table('users')->join('orders', 'orders.user_id', '=', 'users.id')
          ->select(['orders.*', 'users.fname', 'users.lname'])
          ->where('users.code', $code)
          ->where('orders.status', '!=', 'cancel')
          ->where('orders.user_id', '!=', Auth::user()->id)
          ->orderBy('orders.created_at', 'desc')
          ->where(function ($query) use ($search) {  // <<<
         $query->where('users.fname', 'LIKE', '%'.$search.'%')
             ->orWhere('users.lname', 'LIKE', '%'.$search.'%')
             ->orWhere('orders.order_number', 'LIKE', '%'.$search.'%')
             ->orWhere('orders.grandtotal', 'LIKE', '%'.$search.'%')
             ->orWhere('orders.date', 'LIKE', '%'.$search.'%')
             ->orWhere('orders.status', 'LIKE', '%'.$search.'%')
             ->orderBy('orders.created_at', 'desc');
          })->paginate($perPage, $columns = ['*'], $pageName = 'memberOrders'
          )->appends([
         'per_page'   => $perPage
          ]);
  
          $pagination = $memberOrders->appends ( array ('search' => $search) );
          if (count ( $pagination ) > 0){
              return view ('fmcg.all_members' ,  compact(
              'perPage', 'members', 'memberOrders' ))->withDetails ( $pagination );     
          } 
          else{redirect()->back()->with('status', 'No record found');  }   
          LogActivity::addToLog('Admin dashboard'); 
          return view('fmcg.all_members', compact('perPage', 'members', 
          'memberOrders' ));
      } 
      else { return Redirect::to('/login');}
  }
   
}// class
