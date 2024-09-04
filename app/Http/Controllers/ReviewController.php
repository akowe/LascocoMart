<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Session;

use Carbon\Carbon;

class ReviewController extends Controller
{
    public function add($product_id)
        {
            $product = Product::where('id', $product_id)->where('prod_status','approve')->first(); 
            if($product)            {
                
                $product_id = $product->id;
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                    ->join('order_items', 'orders.id','=','order_items.order_id')
                    ->where('order_items.product_id',$product_id)->get();
                return view('review', compact('product','verified_purchase'));
            }else{
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        }
        
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('prod_status','approve')->first(); 
        if($product){
            $user_review = $request->input('user_review');
            $stars_rated = $request->input('stars_rated');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review,
                'stars_rated' => $stars_rated,
                ]);
                if ($new_review){
                    \LogActivity::addToLog('Rating');
                    return redirect('/')->with('status', 'Thank you for writing a review');
                }
        }
        else{
            return redirect('/')->with('status', "The link you followed was broken");
        }
    }
    
    public function reviews(Request $request, $prod_name)
        {
            $review = Product::where('prod_name', $prod_name)->get('id');
            $reviews = Review::where('prod_id', $review)->get();
            \LogActivity::addToLog('Review');
             return view('preview', compact('reviews'));
        }

    
}
