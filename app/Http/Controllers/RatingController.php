<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RatingController extends Controller
{
    public function add($product_id)
        {
            $stars_rated = $request-> input('product_rating');
            $product_id = $request->input('product_id');
            
            $product_check = Product::where('id',$product_id)->where('prod_status','approve')->first();
            if($product_check)
            {
                $product_id = $product->id;
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                    ->join('order_items', 'orders.id','=','order_items.order_id')
                    ->where('order_items.product_id',$product_id)->get();
            }else{
               
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        }
   
   public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('prod_status','approve')->first(); 
        if($product){
            $stars_rated = $request->input('stars_rated');
            $new_review = Rating::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'stars_rated' => $stars_rated
                ]);
                if ($new_review){
                    \LogActivity::addToLog('Rating ');
                    return redirect('/')->with('status', "Thank you for writing a review");
                }
        }
        else{
            return redirect('/')->with('status', "The link you followed was broken");
        }
    }
}
