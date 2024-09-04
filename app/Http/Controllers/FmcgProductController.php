<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ReviewController;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Models\Categories;
use App\Models\Voucher;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Mail\LowStockEmail;
use App\Models\About;
use App\Models\Privacy;
use App\Models\ReturnRefund;
use App\Models\Terms;
use App\Models\Review;
use App\Models\Wishlist;
use App\Mail\MemberWelcomeEmail;
use Session;
use Validator;
use Auth;
use Mail;

use Carbon\Carbon;

class FmcgProductController extends Controller
{

    public function __construct(){
          $this->middleware('auth');      
    }
    //
    public function fmcgsProducts( Request $request){
        $stars = DB::table('reviews')->selectRaw('ROUND(AVG(rating))')
            ->whereColumn('product_id', 'fmcg_products.id');
    
            $products =  DB::table('fmcg_products')
            ->join('users', 'users.id', '=', 'fmcg_products.seller_id')
            ->select('fmcg_products.*', 'users.coopname')
         
            ->selectSub($stars, 'rating')
            ->where('fmcg_products.prod_status', 'approve')
            ->orderBy('fmcg_products.created_at', 'desc')
            ->paginate($request->get('per_page', 8));
          
            $seller = Arr::pluck($products, 'seller_id');
            $get_seller_id = implode(" ",$seller);
            
            //get sellers details
            $email          = User::where('id', $get_seller_id)->get('email');
            $seller_details = User::where('id', $get_seller_id)->get();
    
            $seller_name    = Arr::pluck($seller_details, 'fname');
            $name           = implode(" ",$seller_name);
    
            //send email notification of low stock
            foreach($products   as $key => $prod){
                $date = Carbon::now();
                if($prod->quantity < 1){
                    FcmgProduct::where('id', $prod->id)
                    ->update(['date' => $date]);
    
                $data = array(
                    'name'      => $name,
                    'prod_name' => $prod->prod_name,
                    'quantity'  => $prod->quantity,  
                    'message'   => 'Your product'  
                                                
                );
                Mail::to($email)->send(new LowStockEmail($data));
                $quantity='0';
                FcmgProduct::whereDate( 'date', '<=', now()->subDays(7))
                ->where('quantity', $quantity)
                ->update(['prod_status' => 'remove']);
                }   
            }     
                \LogActivity::addToLog('FmcgProduct page');
                return view('fmcgs_products', compact('products'));
             
        }
  
    /**
     * my code on Method
     *
     * @return response()
     */
    //Search by product, join product and category table
    public function fmcgCategory(Request $request){
        if(Auth::user()){
            $id = Auth::user()->id;
            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);
            $wish = FcmgProduct::join('wishlist', 'wishlist.product_id', '=', 'fmcg_products.id')
             ->get('fmcg_products.*');

            if( $search = $request->input('search')){
                $vendor = DB::table('users')->selectRaw('coopname')
                ->whereColumn('id', 'fmcg_products.seller_id');

                $products = DB::table('fmcg_products')
                ->join('categories', 'categories.cat_id', '=', 'fmcg_products.cat_id')
                ->join('users', 'users.id', '=', 'fmcg_products.seller_id')
                ->select('*')
                ->selectSub($vendor, 'coopname')
                ->orwhere('prod_name', 'LIKE', "%{$search}%") // search by product name
               // ->orWhere('prod_brand', 'LIKE', "%{$search}%") //search by brand name
                ->orwhere('users.coopname', 'LIKE', "%{$search}%") //search by vendor name
                ->where('fmcg_products.prod_status', 'approve')
                ->paginate($request->get('per_page', 9));
                $pagination = $products->appends ( array ('search' => $search) );
                if (count ( $products ) > 0){
                    \LogActivity::addToLog('Search');
                    return view ( 'fmcg_category' , compact('products', 'wishlist', 'wish'))->withDetails ( $products )->withQuery ( $search );
                        
                }
                return view ( 'fmcg_category', compact('products', 'wishlist', 'wish') )->with('status', 'No Details found. Try to search again !' );
            }
                        
            elseif ($search = $request->input('category')) {
                    $vendor = DB::table('users')->selectRaw('coopname')
                    ->whereColumn('id', 'fmcg_products.seller_id');
    
                    $products = DB::table('fmcg_products')
                    ->join('categories', 'categories.cat_id', '=', 'fmcg_products.cat_id')
                    ->select('*')
                    ->selectSub($vendor, 'coopname')
                    ->where('categories.cat_name', 'LIKE', "%{$search}%")
                    ->where('fmcg_products.prod_status', 'approve') 
                    // ->get(['fmcg_products.*', 'categories.cat_name']);
                    ->paginate($request->get('per_page', 9));
                    $pagination = $products->appends ( array ('category' => $search) );
                    if (count ( $products ) > 0){
                        \LogActivity::addToLog('Search');
                        return view ( 'fmcg_category' , compact('products', 'wishlist', 'wish'))->withDetails ( $products )->withQuery ( $search );
                        
                    }
                    return view ( 'fmcg_category', compact('products', 'wishlist', 'wish') )->with('status', 'No Details found. Try to search again !' );
          
            }   
        }
        else{
            if( $search = $request->input('search')){
                $vendor = DB::table('users')->selectRaw('coopname')
                ->whereColumn('id', 'fmcg_products.seller_id');

                $products = DB::table('fmcg_products')
                ->join('categories', 'categories.cat_id', '=', 'fmcg_products.cat_id')
                ->join('users', 'users.id', '=', 'fmcg_products.seller_id')
                ->select('*')
                ->selectSub($vendor, 'coopname')
                ->orwhere('fmcg_products.prod_name', 'LIKE', "%{$search}%") // search by product name
               // ->orwhere('fmcg_products.prod_brand', 'LIKE', "%{$search}%") //search by brand name
                ->orwhere('users.coopname', 'LIKE', "%{$search}%") //search by vendor name
                ->where('fmcg_products.prod_status', 'approve')
                ->paginate($request->get('per_page', 9));
                $pagination = $products->appends ( array ('search' => $search) );
                if (count ( $products ) > 0){
                    \LogActivity::addToLog('Search');
                    return view ( 'fmcg_category' , compact('products'))->withDetails ( $products )->withQuery ( $search );
                        
                }
                return view ( 'fmcg_category', compact('products') )->with('status', 'No Details found. Try to search again !' );
                }
                        
                elseif ($search = $request->input('category')) {
                    $vendor = DB::table('users')->selectRaw('coopname')
                    ->whereColumn('id', 'fmcg_products.seller_id');
    
                    $products = DB::table('fmcg_products')
                    ->join('categories', 'categories.cat_id', '=', 'fmcg_products.cat_id')
                    ->select('*')
                    ->selectSub($vendor, 'coopname')
                    ->where('categories.cat_name', 'LIKE', "%{$search}%")
                    ->where('fmcg_products.prod_status', 'approve') 
                    // ->get(['fmcg_products.*', 'categories.cat_name']);
                    ->paginate($request->get('per_page', 9));
                    $pagination = $products->appends ( array ('category' => $search) );
                    if (count ( $products ) > 0){
                        \LogActivity::addToLog('Search');
                        return view ( 'fmcg_category' , compact('products'))->withDetails ( $products )->withQuery ( $search );
                        
                    }
                    return view ( 'fmcg_category', compact('products') )->with('status', 'No Details found. Try to search again !' );
          
                    }
         }
    }
   
    public function fmcgcart(){
        if(Auth::user()){
            $id = Auth::user()->id;
            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);
            $wish = FcmgProduct::join('wishlist', 'wishlist.product_id', '=', 'fmcg_products.id')
             ->get('fmcg_products.*');
             \LogActivity::addToLog('fmcgCart');
             return view('fmcgcart', compact( 'wishlist', 'wish'));
         }
         else{
            return view('fmcgcart');
         }
    }
   
    public function fmcgAddToCart($id){
        $product = FcmgProduct::findOrFail($id);
        $cart = session()->get('fmcgcart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else { 
            $cart[$id] = [
                "prod_name" => $product->prod_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "id" => $product->id,
                "seller_id" => $product->seller_id,
            ];
        }
        session()->put('fmcgcart', $cart);
        \LogActivity::addToLog('New fmcgCart');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function fmcgcheckout(Request $request){
        if( Auth::user()){
           $firstTimeLoggedIn = Auth::user()->last_login;
           if (empty($firstTimeLoggedIn)) {
             $data = 
             array( 
             'name'      => Auth::user()->fname,
             'coopname'  => Auth::user()->coopname,
             'email'     => Auth::user()->email,
           );
             Mail::to(Auth::user()->email)->send(new MemberWelcomeEmail($data));  
             $user = Auth::user();
             $user->last_login = Carbon::now();
             $user->save();
           }
           elseif (!empty($firstTimeLoggedIn)) {
             $user = Auth::user();
             $user->last_login = Carbon::now();
             $user->save();
           }
           $id = Auth::user()->id;// get user id for the login member
           $cart = session()->get('fmcgcart');
           $cart[$request->id]["quantity"] = $request->quantity;
           $cart[$request->id]["price"] = $request->price;
           $cart[$request->id]["seller_id"] = $request->seller_id;
           $totalAmount = 0;
           foreach ($cart as $item) {
               $totalAmount += $item['price'] * $item['quantity'];

           }//foreach
          $voucher = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')
           ->where('vouchers.user_id', $id)
           ->get(['vouchers.*', 'users.*']); 

           $wishlist = Wishlist::where('user_id', $id)->get('product_id');
           $getWish = Arr::pluck($wishlist, 'product_id');
           $saveItem = implode(',', $getWish);
           $wish = FcmgProduct::join('wishlist', 'wishlist.product_id', '=', 'fmcg_products.id')
           ->get('fmcg_products.*');
           //\LogActivity::addToLog('fmcgCheckout');
           return view('fmcgcheckout', compact('voucher', 'wishlist', 'wish'));
       }
       else { return Redirect::to('/login');}

   }
  

    public function updatefmcg(Request $request){ 
        if($request->id && $request->quantity){
            $cart = session()->get('fmcgcart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('fmcgcart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        \LogActivity::addToLog('Update fmcgCart');
        return redirect()->back()->with('success', 'Cart Updated Successfully !');
    }
  
    public function removefmcg(Request $request)
    {
        if($request->id) {
            $cart = session()->get('fmcgcart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('fmcgcart', $cart);
                session()->flash('success', 'Product removed successfully');
               
            }
            \LogActivity::addToLog('Remove cart');
             return redirect()->back()->with('success', 'Product removed successfully');
        }
    }

    
  public function addToCartPreview($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('fmcgcart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "prod_name" => $product->prod_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "id" => $product->id
            ];
        }
        session()->put('fmcgcart', $cart);
        \LogActivity::addToLog('View cart');
        return redirect()->route('fmcgcart')->with('success', 'Product added to cart successfully!');
    }


public function fmcgpreview(Request $request, $prod_name)
{
   $products = FcmgProduct::where('prod_name', $prod_name)->get('*');
     return view('preview', compact('products'));
     
}

 public function about_us(Request $request){
        $about = About::all();
        return view('about', compact('about'));
  }

public function privacy_policy(Request $request){
        $about = Privacy::all();
        return view('privacy_policy', compact('about'));
  }

public function return_policy(Request $request){
        $about = ReturnRefund::all();
        return view('refund_and_return_policy', compact('about'));
  }

  public function terms(Request $request){
        $about = Terms::all();
        return view('terms_and_condition', compact('about'));
  }

 
}//class
