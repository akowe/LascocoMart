<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Notifications\NewProduct;
use App\Models\Transaction;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
// use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SellerWelcomeEmail;

use Carbon\Carbon;
use Auth;
use Validator;
use Session;
use Paystack;
use Storage;
use Mail;
use Notification;
use DateTime;

class MerchantController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('merchant');
    }

    public function index(Request $request){
    if( Auth::user()->role_name  == 'merchant'){
      $id = Auth::user()->id; //

      $firstTimeLoggedIn = Auth::user()->last_login;
      if (empty($firstTimeLoggedIn)) {
        $data = 
        array( 
          'name'      => Auth::user()->fname,
          'coopname'  => Auth::user()->coopname,
            'email'     => Auth::user()->email,
      );
        Mail::to(Auth::user()->email)->send(new SellerWelcomeEmail($data));  
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
            Session::flash('profile', ' You are yet to complete your profile!'); 
            Session::flash('alert-class', 'alert-success'); 
            return Redirect::to('/account-settings');       
        }
          
       
        $countProduct = User::join('products', 'products.seller_id', '=', 'users.id')
        ->where('products.deleted_at',  null)
        ->where('products.seller_id', $id);

        $countApprovedProduct = User::join('products', 'products.seller_id', '=', 'users.id')
        ->where('products.prod_status', 'approve')
        ->where('products.seller_id', $id);

         $countSoldProducts =  OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
         ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
          ->join('products', 'products.id', '=', 'order_items.product_id')
          ->where('orders.status', 'paid')
          ->where('orders.user_id', '!=', Auth::user()->id)
         ->where('order_items.seller_id', $id);

         //count paid orders
         $countPaidOrders = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
         ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
          ->join('products', 'products.id', '=', 'order_items.product_id')
          ->where('orders.status', 'paid')
          ->where('orders.user_id', '!=', Auth::user()->id)
         ->where('order_items.seller_id', $id);

         $countShippedItem= OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
         ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
         ->join('products', 'products.id', '=', 'order_items.product_id')
         ->where('order_items.delivery_status', 'delivered')
         ->where('orders.user_id', '!=', Auth::user()->id)
         ->where('order_items.seller_id', $id);

          $approveOrders = Product::join('order_items', 'order_items.product_id', '=', 'products.id')
          ->join('orders', 'orders.id', '=', 'order_items.order_id')
          ->where('orders.status', 'approved')
           ->where('products.seller_id', $id);
 
           \LogActivity::addToLog('Merchant dashboard');

         $perPage = $request->perPage ?? 10;
         $search = $request->input('search');

         $sales = DB::table('order_items')
         ->join('orders', 'orders.id', '=', 'order_items.order_id')
         ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
          ->join('products', 'products.id', '=', 'order_items.product_id')
         ->select([
          'orders.*',
          'order_items.*',
          'users.fname', 
          'users.phone',
          'products.prod_name',
          'products.image',
          'products.seller_price'
          ])
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
                 return view ('merchants.merchant' ,  compact(
                     'perPage', 
                     'countProduct',
                     'countApprovedProduct', 
                     'countSoldProducts',
                     'sales', 'countPaidOrders', 
                     'approveOrders', 
                     'countShippedItem'))->withDetails ( $pagination );     
             } 
             else{
                 redirect()->back()->with('status', 'No record found'); 
             }   

          return view('merchants.merchant', compact('perPage', 
          'countProduct', 'countApprovedProduct', 
          'countSoldProducts', 'sales', 'countPaidOrders', 
          'approveOrders', 'countShippedItem'));

       }
    else { return Redirect::to('/login');
    
        }
    }

    public function vendorProducts(Request $request){
    if( Auth::user()->role_name  == 'merchant'){
      $id = Auth::user()->id; 
      $countProduct =  DB::table('products')
      ->where('products.deleted_at',  null)
      ->where('seller_id', $id);

      $countApprovedProduct = User::join('products', 'products.seller_id', '=', 'users.id')
      ->where('products.prod_status', 'approve')
      ->where('users.id', $id);

       $countSoldProducts =  OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
       ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->where('orders.status', 'paid')
        ->where('orders.user_id', '!=', Auth::user()->id)
       ->where('order_items.seller_id', $id);

       $perPage = $request->perPage ?? 10;
       $search = $request->input('search');

      $products =  DB::table('products')->select(['*'])
      ->where('products.deleted_at',  null)
      ->where('seller_id', $id)
       ->orderBy('products.created_at', 'desc')
       ->where(function ($query) use ($search) {  // <<<
      $query->where('products.prod_name', 'LIKE', '%'.$search.'%')
          ->orWhere('products.seller_price', 'LIKE', '%'.$search.'%')
          ->orWhere('products.old_price', 'LIKE', '%'.$search.'%')
          ->orWhere('products.prod_status', 'LIKE', '%'.$search.'%')
          ->orWhere('products.created_at', 'LIKE', '%'.$search.'%')
          ->orWhere('products.prod_brand', 'LIKE', '%'.$search.'%')
          ->orderBy('products.created_at', 'desc');
       })->paginate($perPage, $columns = ['*'], $pageName = 'products')
       ->appends(['per_page'   => $perPage]);

       $pagination = $products->appends ( array ('search' => $search) );
        if (count ( $pagination ) > 0){
          return view ('merchants.all-products' ,  compact('perPage', 
          'countProduct','countApprovedProduct', 'countSoldProducts',
          'products'))->withDetails ( $pagination );     
        }  else{
               redirect()->back()->with('status', 'No record found'); 
           }   
       
        \LogActivity::addToLog('AllProducts');
        return view('merchants.all-products', compact('perPage', 
        'countProduct', 'countApprovedProduct', 'countSoldProducts',
        'products'));
      }
      else { return Redirect::to('/login');}
    }
    
    //new products page
    public function newProduct(Request $request){
    if( Auth::user()->role_name  == 'merchant'){
        $categories = Categories::all(); 
        \LogActivity::addToLog('Product');
        return view('merchants.add_new_product', compact('categories'));
        }
      else { return Redirect::to('/login');
        }
    }

      public function addProductToStore(Request $request)
        {   
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
            //this works on local host and linux
           //$path = $request->file('image')->store('/images/resource', ['disk' =>   'my_files']);
           
            $image= $request->file('image');
            if(isset($image)){
            $imageName =  rand(1000000000, 9999999999).'.jpeg';
             $image->move(public_path('images/products'),$imageName);
             $image_path = "/images/products/" . $imageName; 
             }
            else {
            $image_path = "";
             }
           $img1= $request->file('img1');
            if(isset($img1))
            {
            $img1Name =  rand(1000000000, 9999999999).'.jpeg';
             $img1->move(public_path('images/products'),$img1Name);
             $img1_path = "/images/products/" . $img1Name; 
             }
            else {
            $img1_path = "";
             }
              $img2= $request->file('img2');
            if(isset($img2))
            {
            $img2Name = rand(1000000000, 9999999999).'.jpeg';
             $img2->move(public_path('images/products'),$img2Name);
             $img2_path = "/images/products/" . $img2Name; 

             }
            else {
            $img2_path = "";
             }
            $img3= $request->file('img3');
            if(isset($img3))
            {
            $img3Name =  rand(1000000000, 9999999999).'.jpeg';
             $img3->move(public_path('images/products'),$img3Name);
             $img3_path = "/images/products/" . $img3Name; 
             }
            else {
            $img3_path = "";
             }
            $img4= $request->file('img4');
            if(isset($img4))
            {
            $img4Name = rand(1000000000, 9999999999).'.jpeg';
             $img4->move(public_path('images/products'),$img4Name);
             $img4_path = "/images/products/" . $img4Name; 
             }
            else {
            $img4_path = "";
             }

            // add company and coperative percentage
            $company_percentage = $request->price *  5 / 100;
            $price = $request->price  + $company_percentage;

           $product = new Product;
           $product->cat_id    = $request->cat_id;
           $product->prod_name  = $request->prod_name;
           $product->quantity   = $request->quantity;
           $product->prod_brand = $request->prod_brand;
           $product->old_price  = $request->old_price;
           $product->seller_price = $request->price;
           $product->price       = $price;
           $product->description = $request->description;
           $product->image      = $image_path;
           $product->img1       = $img1_path;
           $product->img2       = $img2_path;
           $product->img3       = $img3_path;
           $product->img4       = $img4_path;
           $product->seller_id  = $user_id;
           $product->seller_role  = $user_role;
           $product->prod_status = 'pending';
           $product->save();

           $superadmin = User::where('role_name', '=', 'superadmin')->get();
           $get_superadmin_id =Arr::pluck($superadmin, 'id');
           $superadmin_id = implode('', $get_superadmin_id);
           
          $product_id =$product->id;
          $product_name= $product->prod_name; 
          $notification = new NewProduct($product_id, $product_name);
          Notification::send($superadmin, $notification);

           // send email notification to superadmin for approval
           $name = Auth::user()->coopname;
                   $data = array(
                    'name'      =>  $name,
                    'message'   =>   'approve'
                );
 
            Mail::to('info@lascocomart.com')->send(new SendMail($data));
            \LogActivity::addToLog('vendorAdd product');
            return redirect('vendor-products')->with('success', 'New product added successfully');   
    }   
 
    public function removeProductPage(Request $request, $id){
      if( Auth::user()){
        $product = Product::find($id);
        return view('merchants.remove-product', compact('product')); 
     }
      else { return Redirect::to('/login');}   
    }

    public function removeProduct(Request $request){
      $seller_id = Auth::user()->id;
      $id = $request->product_id;
      //soft delete
      Product::where('id', $id)->where('seller_id', $seller_id)->delete(); 
      Product::where('id', $id)->update([
        'prod_status' =>  'deleted',
        ]);
      // $product->prod_status    = 'deleted';
      // $product->update();
      
      \LogActivity::addToLog('Remove product');
      return redirect('vendor-products')->with('success', 'Product Removed Successful!');
  }

      //edit product
    public function editProduct(Request $request, $id){
      if( Auth::user()){
          $product = Product::find($id);
          //dd($product->id);
          return view('merchants.edit-product', compact('product')); 
      }
        else { return Redirect::to('/login');
      }
}

    //update product
    public function updateProduct(Request $request, $id){
      $this->validate($request, [
        'quantity'      => 'required|max:255',  
        'old_price'    => 'max:255',
        'price'        => 'required|max:255',
        'productname'  => 'required|max:255',
        'brand'        => 'max:255',
        'description'  => 'max:255',
        ]);
        //$id = $request->id;

        // add company and coperative percentage
        $company_percentage = $request->price *  5 / 100;
        $price = $request->price  + $company_percentage;

        $product = Product::find($id);
        $product->prod_name     = $request->productname;
        $product->quantity      = $request->quantity;
        $product->old_price     = $request->old_price;
        $product->seller_price  = $request->price;
        $product->price         = $price;
        $product->prod_brand     = $request->brand;
        $product->description     = $request->description;
        $product->update();

        // Product::where('id', $$id)->update([
        //   'prod_name'         => $request->productname,
        //   'quantity'          => $request->quantity,
        //   'old_price'         => $request->old_price,
        //   'seller_price'      => $request->price,
        //   'price'             => $price,
        //   'prod_brand'         => $request->brand,
        //   'description'       => $request->description,
        //   ]);

        $data = 'Edit successful for ' .$request->productname. '';
        \LogActivity::addToLog('ProductUpdate');
        return redirect('vendor-products')->with('success',  $data);
    }

    public function vendorSales(Request $request)
    {
         if( Auth::user()->role_name  == 'merchant'){
               $id = Auth::user()->id; //  
       
              $countPaidOrders = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
              ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
              ->join('products', 'products.id', '=', 'order_items.product_id')
              ->where('orders.status', 'paid')
              ->where('orders.user_id', '!=', Auth::user()->id)
              ->where('order_items.seller_id', $id);

              $countSoldProducts = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
              ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
              ->join('products', 'products.id', '=', 'order_items.product_id')
              ->where('orders.status', 'paid')
              ->where('orders.user_id', '!=', Auth::user()->id)
              ->where('order_items.seller_id', $id);

              $countShippedItem= OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
              ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
              ->join('products', 'products.id', '=', 'order_items.product_id')
              ->where('order_items.delivery_status', 'delivered')
              ->where('orders.user_id', '!=', Auth::user()->id)
              ->where('order_items.seller_id', $id);

              $perPage = $request->perPage ?? 10;
              $search = $request->input('search');

               $sales = DB::table('order_items')
               ->join('orders', 'orders.id', '=', 'order_items.order_id')
               ->join('users', 'users.id', '=', 'orders.user_id')// get the buyer
                ->join('products', 'products.id', '=', 'order_items.product_id')
               ->select([
                'orders.*',
                'order_items.*',
                'users.fname', 
                'users.phone',
                'products.prod_name',
                'products.image',
                'products.seller_price',
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
                    return view('merchants.sales', compact(
                           'perPage', 'sales', 'countPaidOrders',
                           'countSoldProducts',
                           'countShippedItem'))->withDetails ( $pagination );     
                   } 
                   else{
                       redirect()->back()->with('status', 'No record found'); 
                   }  

              \LogActivity::addToLog('Sales');
              return view('merchants.sales', compact('perPage', 'sales', 
              'countPaidOrders', 'countSoldProducts', 'countShippedItem'));

         }
         else{
            return Redirect::to('/login');
         } 
    }
 
    public function invoice(Request $request, $order_number ){ 
        if( Auth::user()->role_name  == 'merchant'){
            $code = Auth::user()->code; //
            $id = Auth::user()->id;
            $item = Order::join('users', 'users.id', '=', 'orders.user_id')// count orders from members
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            // ->join('shipping_details', 'shipping_details.shipping_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            // ->join('vouchers', 'vouchers.user_id', '=', 'users.id')
            ->where('products.seller_id', $id) 
            ->where('orders.order_number', $order_number)
            ->get([ 'orders.*', 'users.*', 'order_items.*', 'products.*'])->first();
         
            $orders = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('products.seller_id', $id) 
            ->where('orders.order_number', $order_number)
            ->get(['orders.*',  'order_items.*',  'products.*']); 
            \LogActivity::addToLog('Invoice');
            return view('invoice', compact('item', 'orders'));
        }
          else { return Redirect::to('/login');}
      }
    
    
    
   

}//class