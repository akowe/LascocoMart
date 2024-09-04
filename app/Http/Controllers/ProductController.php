<?php

namespace App\Http\Controllers;


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
use App\Models\SMS;
use App\Models\Profile;
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

class ProductController extends Controller
{

    public function __construct(){
    }

    public function index( Request $request){
     
        $stars = DB::table('reviews')->selectRaw('ROUND(AVG(rating))')
    //   ->selectRaw('ROUND(count(user_id)) as user')
        ->whereColumn('product_id', 'products.id');

        $products =  DB::table('products')
        ->join('users', 'users.id', '=', 'products.seller_id')
        ->select('products.*', 'users.coopname')
     
        ->selectSub($stars, 'rating')
        ->where('products.prod_status', 'approve')
       ->orderBy('products.created_at', 'desc')
        ->inRandomOrder()
        ->paginate($request->get('per_page', 16));
      
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
                Product::where('id', $prod->id)
                ->update(['date' => $date]);

            $data = array(
                'name'      => $name,
                'prod_name' => $prod->prod_name,
                'quantity'  => $prod->quantity,  
                'message'   => 'Your product'  
                                            
            );
            Mail::to($email)->send(new LowStockEmail($data));
            $quantity='0';
            Product::whereDate( 'date', '<=', now()->subDays(7))
            ->where('quantity', $quantity)
            ->update(['prod_status' => 'remove']);
            }
           
        }  
        if(Auth::user()){
            $vendorName =  DB::table('users')
            ->where('coopname', Auth::user()->coopname)->first()->coopname;

            $id = Auth::user()->id;
            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);

        //     $wish['wish'] = Product::join('users', 'users.id', '=', 'products.seller_id')
        // ->join('wishlist', 'wishlist.product_id', '=', 'products.id')
        //     ->where('users.code','=',Auth::user()->code)
        //     ->where('wishlist.user_id', $id);

            $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
            ->join('users', 'users.id', '=', 'products.seller_id')
            ->where('wishlist.user_id', $id)
            ->where('users.code', $vendorName)
           ->orderBy('users.coopname', 'desc')
            ->inRandomOrder()
             ->get('products.*');
           
            
             \LogActivity::addToLog('Product page');
             return view('products', compact('products', 'wishlist', 'wish'));
         }
         else{
            \LogActivity::addToLog('Product page');
            return view('products', compact('products'));
         }
       
    }

    public function vendorProduct( Request $request, $vendor){
        $vendorName =  DB::table('users')
        ->where('coopname', $vendor)->first()->coopname;
     
        $stars = DB::table('reviews')->selectRaw('ROUND(AVG(rating))')
    //   ->selectRaw('ROUND(count(user_id)) as user')
        ->whereColumn('product_id', 'products.id');

        $products =  DB::table('products')
        ->join('users', 'users.id', '=', 'products.seller_id')
        ->select('products.*', 'users.coopname')
     
        ->selectSub($stars, 'rating')
        ->where('products.prod_status', 'approve')
        ->where('users.coopname', $vendor)
        ->orderBy('products.created_at', 'desc')
        ->paginate($request->get('per_page', 16));
        if(Auth::user()){
            $id = Auth::user()->id;
            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);
            $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
            ->where('wishlist.user_id', $id)
             ->get('products.*');
             \LogActivity::addToLog('Product page');
             return view('vendor-products', compact('products', 'wishlist', 'wish', 'vendorName'));
         }
         else{
            \LogActivity::addToLog('Product page');
            return view('vendor-products', compact('products', 'vendorName'));
         }
     
       
    }
 
    public function cart(){
        if(Auth::user()){
            $id = Auth::user()->id;
            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);
            $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
             ->get('products.*');
             \LogActivity::addToLog('Cart');
             return view('cart', compact( 'wishlist', 'wish'));
         }
         else{
            return view('cart');
         }
     
    }

    //Search by product, join product and category table
    public function category(Request $request){
        if ( $search = $request->input('category')) {

             $products =Product::join('categories', 'categories.cat_id', '=', 'products.cat_id')
                   
                    ->where('categories.cat_name', 'LIKE', "%{$search}%") 
                   ->get(['products.*', 'categories.cat_name']);
                   \LogActivity::addToLog('Category');
                return view('products', compact('products'));
            }
        }

   
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
  
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
        session()->put('cart', $cart);
        \LogActivity::addToLog('New cart');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  

    public function update(Request $request){ 
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        \LogActivity::addToLog('Update cart');
        return redirect()->back()->with('success', 'Cart Updated Successfully !');
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product removed successfully');
               
            }
            \LogActivity::addToLog('Remove cart');
             return redirect()->back()->with('success', 'Product removed successfully');
        }
    }

    
    public function checkout(Request $request){
         if( Auth::user()){
            $id = Auth::user()->id; //
            $profile =  Profile::where('user_id', $id)->get('user_id')->first();
    
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
    
              $profile =  new Profile;
              $profile->user_id           =     Auth::user()->id;
              $profile->fname             =     Auth::user()->fname;
              $profile->address           =     Auth::user()->address;
              $profile->phone             =     Auth::user()->phone;
              $profile->bank              =     Auth::user()->bank;
              $profile->account_number    =     Auth::user()->account_number;
              $profile->account_name      =     Auth::user()->account_name;
              $profile->cooperative_cert  =     Auth::user()->cooperative_cert;
              $profile->rcnumber          =     Auth::user()->rcnumber;
              $profile->profile_img       =     Auth::user()->profile_img;
              $profile->save(); 
    
              return redirect('/account-settings')->with('status', ' You are yet to complete your profile!');  
          
            }
            elseif (!empty($firstTimeLoggedIn)) {
               $user = Auth::user();
               $user->last_login = Carbon::now();
               $user->save();
    
               if (empty($profile)){ 
                   $profile =  new Profile;
                   $profile->user_id           =     Auth::user()->id;
                   $profile->fname             =     Auth::user()->fname;
                   $profile->address           =     Auth::user()->address;
                   $profile->phone             =     Auth::user()->phone;
                   $profile->bank              =     Auth::user()->bank;
                   $profile->account_number    =     Auth::user()->account_number;
                   $profile->account_name      =     Auth::user()->account_name;
                   $profile->cooperative_cert  =     Auth::user()->cooperative_cert;
                   $profile->rcnumber          =     Auth::user()->rcnumber;
                   $profile->profile_img       =     Auth::user()->profile_img;
                   $profile->save(); 
               }
            }
            $id = Auth::user()->id;// get user id for the login member
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["price"] = $request->price;
            $cart[$request->id]["seller_id"] = $request->seller_id;
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }//foreach
            //member pay with their credit
           $voucher = Voucher::join('users', 'users.id', '=', 'vouchers.user_id')
            ->where('vouchers.user_id', $id)
            ->get(['vouchers.*', 'users.*']); 

            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);
            $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
            ->get('products.*');
            \LogActivity::addToLog('Checkout');
            return view('checkout', compact('voucher', 'wishlist', 'wish'));
        }
        else { return Redirect::to('/login');}

        }

    
  public function addToCartPreview($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
  
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
        session()->put('cart', $cart);
        \LogActivity::addToLog('View cart');
        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }


public function preview(Request $request, $prod_name)
{
   $products = Product::where('prod_name', $prod_name)->get('*');
    $review = Product::where('prod_name', $prod_name)->get('id');
    $prod_id = Arr::pluck($review, 'id');  
    $id = implode(" ",$prod_id);
    
    $reviews = Review::Join('users', 'users.id', '=', 'reviews.user_id')
     ->where('product_id', $id)->get('*');

     if(Auth::user()){
        $id = Auth::user()->id;
        $wishlist = Wishlist::where('user_id', $id)->get('product_id');
        $getWish = Arr::pluck($wishlist, 'product_id');
        $saveItem = implode(',', $getWish);
        $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
        ->where('wishlist.user_id', $id)
         ->get('products.*');
         \LogActivity::addToLog('Product page');
         return view('preview', compact('products', 'wishlist', 'wish', 'reviews'));
     }
     else{
        \LogActivity::addToLog('Preview product');
        return view('preview', compact('products', 'reviews'));
     }
    
}


 public function about_us(Request $request){
        $about = About::all();
        \LogActivity::addToLog('Aboutus');
        return view('about', compact('about'));
  }

public function privacy_policy(Request $request){
        $about = Privacy::all();
        \LogActivity::addToLog('Privacy policy');
        return view('privacy_policy', compact('about'));
  }

public function return_policy(Request $request){
        $about = ReturnRefund::all();
        \LogActivity::addToLog('Return policy');
        return view('refund_and_return_policy', compact('about'));
  }

  public function terms(Request $request){
        $about = Terms::all();
        \LogActivity::addToLog('T and C page');
        return view('terms_and_condition', compact('about'));
  }


  public function addWishList($id){
    if( Auth::user()){
        $product = Product::findOrFail($id);
        $newWishlist = new Wishlist();
        $newWishlist->user_id = Auth::user()->id;
        $newWishlist->product_id = $product->id;
        $newWishlist->save();
        if($newWishlist){
            \LogActivity::addToLog('New Wishlist');
            return redirect()->back()->with('success', 'Product successfully added to your wishlist !');
        }

       }
    else{
        return Redirect::to('/login');
    }
}  

public function wishlist(Request $request){
    if( Auth::user()){
    $id = Auth::user()->id;
    $wishlist = Wishlist::where('user_id', $id)->get();
    $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
    ->where('wishlist.user_id', $id)
    ->where('wishlist.deleted_at', null)
     ->get('products.*');
     \LogActivity::addToLog('Wishlist');
    return view('wish', compact('wishlist', 'wish'));
    }
    else{
        return Redirect::to('/login');
    }
}

public function removeWishlist(Request $request){
    if( Auth::user()){
    $id = Auth::user()->id;
    $wishlist = Wishlist::where('product_id', $request->id)
    ->where('user_id', $id)
    ->delete();
    \LogActivity::addToLog('Remove wishlist');
    return redirect()->back()->with('success', 'Product successfully removed from your wishlist !');
        
    }
    else{
        return Redirect::to('/login');
    }
}
 
}//class