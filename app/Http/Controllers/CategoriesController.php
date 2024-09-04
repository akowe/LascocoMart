<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Auth;

class CategoriesController extends Controller
{
    public function autocomplete(Request $request){
        $product = Product::select("prod_name")
        ->where("prod_name","LIKE","%{$request->search}%")
        ->get();
        $data = Arr::pluck($product, 'prod_name');
        if($data > 0){
            return response()->json($data);
        }
        else{
            $result= array(
                'result'=>'Result not found'
            );
            $details = Arr::pluck($result, 'result');
            return response()->json($details);
        }
    }

    public function category(Request $request){ 
        if(Auth::user()){
            $id = Auth::user()->id;
            $wishlist = Wishlist::where('user_id', $id)->get('product_id');
            $getWish = Arr::pluck($wishlist, 'product_id');
            $saveItem = implode(',', $getWish);
            $wish = Product::join('wishlist', 'wishlist.product_id', '=', 'products.id')
             ->get('products.*');

            if( $search = $request->input('search')){
                $vendor = DB::table('users')->selectRaw('coopname')
                ->whereColumn('id', 'products.seller_id');

                $products = DB::table('products')
                ->join('categories', 'categories.cat_id', '=', 'products.cat_id')
                ->join('users', 'users.id', '=', 'products.seller_id')
                ->select('*')
                ->selectSub($vendor, 'coopname')
                ->orwhere('prod_name', 'LIKE', "%{$search}%") // search by product name
               // ->orWhere('prod_brand', 'LIKE', "%{$search}%") //search by brand name
                ->orwhere('users.coopname', 'LIKE', "%{$search}%") //search by vendor name
                ->where('products.prod_status', 'approve')
                ->paginate($request->get('per_page', 9));
                $pagination = $products->appends ( array ('search' => $search) );
                if (count ( $products ) > 0){
                    \LogActivity::addToLog('Search');
                    return view ( 'category' , compact('products', 'wishlist', 'wish'))->withDetails ( $products )->withQuery ( $search );
                        
                }
                return view ( 'category', compact('products', 'wishlist', 'wish') )->with('status', 'No Details found. Try to search again !' );
            }
                        
            elseif ($search = $request->input('category')) {
                    $vendor = DB::table('users')->selectRaw('coopname')
                    ->whereColumn('id', 'products.seller_id');
    
                    $products = DB::table('products')
                    ->join('categories', 'categories.cat_id', '=', 'products.cat_id')
                    ->select('*')
                    ->selectSub($vendor, 'coopname')
                    ->where('categories.cat_name', 'LIKE', "%{$search}%")
                    ->where('products.prod_status', 'approve') 
                    // ->get(['products.*', 'categories.cat_name']);
                    ->paginate($request->get('per_page', 9));
                    $pagination = $products->appends ( array ('category' => $search) );
                    if (count ( $products ) > 0){
                        \LogActivity::addToLog('Search');
                        return view ( 'category' , compact('products', 'wishlist', 'wish'))->withDetails ( $products )->withQuery ( $search );
                        
                    }
                    return view ( 'category', compact('products', 'wishlist', 'wish') )->with('status', 'No Details found. Try to search again !' );
          
            }   
        }
        else{
            if( $search = $request->input('search')){
                $vendor = DB::table('users')->selectRaw('coopname')
                ->whereColumn('id', 'products.seller_id');

                $products = DB::table('products')
                ->join('categories', 'categories.cat_id', '=', 'products.cat_id')
                ->join('users', 'users.id', '=', 'products.seller_id')
                ->select('*')
                ->selectSub($vendor, 'coopname')
                ->orwhere('products.prod_name', 'LIKE', "%{$search}%") // search by product name
               // ->orwhere('products.prod_brand', 'LIKE', "%{$search}%") //search by brand name
                ->orwhere('users.coopname', 'LIKE', "%{$search}%") //search by vendor name
                ->where('products.prod_status', 'approve')
                ->paginate($request->get('per_page', 9));
                $pagination = $products->appends ( array ('search' => $search) );
                if (count ( $products ) > 0){
                    \LogActivity::addToLog('Search');
                    return view ( 'category' , compact('products'))->withDetails ( $products )->withQuery ( $search );
                        
                }
                return view ( 'category', compact('products') )->with('status', 'No Details found. Try to search again !' );
                }
                        
                elseif ($search = $request->input('category')) {
                    $vendor = DB::table('users')->selectRaw('coopname')
                    ->whereColumn('id', 'products.seller_id');
    
                    $products = DB::table('products')
                    ->join('categories', 'categories.cat_id', '=', 'products.cat_id')
                    ->select('*')
                    ->selectSub($vendor, 'coopname')
                    ->where('categories.cat_name', 'LIKE', "%{$search}%")
                    ->where('products.prod_status', 'approve') 
                    // ->get(['products.*', 'categories.cat_name']);
                    ->paginate($request->get('per_page', 9));
                    $pagination = $products->appends ( array ('category' => $search) );
                    if (count ( $products ) > 0){
                        \LogActivity::addToLog('Search');
                        return view ( 'category' , compact('products'))->withDetails ( $products )->withQuery ( $search );
                        
                    }
                    return view ( 'category', compact('products') )->with('status', 'No Details found. Try to search again !' );
          
                    }

         }
 
    }


// add to cart from category page
    public function addToCart($id)
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
                 "id" => $product->id,
                "seller_id" => $product->seller_id
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

   
}