<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundRequest;
use App\Models\User;
use App\Models\SMS;
use App\Models\Profile;
use App\Notifications\CooperativeFundRequest;
use App\Notifications\MemberFundRequest;
use App\Notifications\NewProduct;
use App\Notifications\ProductDelivered;
use App\Notification\NewCardPayment;
use App\Notifications\ProductReceived;
use App\Notifications\AdminCancelOrder;
use App\Notifications\ApproveFund;
use App\Notifications\CancelFundRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Order;
use App\Models\Credit;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Models\OrderItem;
use App\Models\fcmgOrder;
use App\Models\fcmgOrderItem;
use App\Mail\RequestFundEmail;
use App\Mail\MemberRequestFundEmail;
use Validator;
use Session;
use Mail;
use Carbon\Carbon;
use Notification;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function markAllNotificationAsRead(){
        //$user->notifications()->delete();
         Auth::user()->unreadNotifications->markAsRead();
         auth()->user()->readNotifications()->delete();
         return redirect()->back();  
     }
    
     public function readNotification($id){
        $notification = auth()->user()->unreadNotifications()->where('id', $id)->first();
        if ($notification) {
             $notification->markAsRead();
        }
        return redirect()->back();
    }

    public function allNewProductNotification(){
        Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewProduct')->markAsRead();
        auth()->user()->readNotifications()
        ->where('type', 'App\Notifications\NewProduct')->delete();
        return redirect()->back();
    }
   
    public function readAProductNotification($id){
       $notification = auth()->user()->unreadNotifications()
       ->where('type', 'App\Notifications\NewProduct')
       ->where('id', $id)->first();
       if ($notification) {
            $notification->markAsRead();
       }
       auth()->user()->readNotifications()
       ->where('type', 'App\Notifications\NewProduct')
       ->where('id', $id)->delete();
       return redirect('products_list');
   }
   
   public function orderDelivered($id, $product_id){
        $email = Auth::user()->email;
        $buyer_id =  User::Join('orders', 'orders.user_id', '=', 'users.id')
        ->where('orders.id', $id)
        ->get('users.id');
        //dd($buyer_id);
        $delivered = OrderItem::where('id', $id)
        ->where('seller_id', Auth::user()->id)
        ->update(['delivery_status' => 'delivered',
                'delivery_date'=> Carbon::now()
                ]);

        $getProduct = OrderItem::Join('orders', 'orders.id', '=', 'order_items.order_id')
        ->Join('products', 'products.id', '=','order_items.product_id')
        ->where('products.id', $product_id)
        ->where('products.seller_id', Auth::user()->id)
        ->get('products.prod_name');

        foreach($getProduct as $details){
            $product_name = $details->prod_name;
        }
        // $product= Arr::pluck($getProduct, 'prod_name'); // 
        // $product_name = implode('', $product);

        $superadmin = User::where('role_name', '=', 'superadmin')->get();
        $get_superadmin_id =Arr::pluck($superadmin, 'id');
        $superadmin_id = implode('', $get_superadmin_id);

        $notification = new ProductDelivered($product_id, $product_name);
        Notification::send($superadmin, $notification);

         $notification = new ProductDelivered($product_id, $product_name);
         Notification::send($buyer_id, $notification);

        if($delivered){
           // Email notification to Coopmart
            // $data = array(
            // 'cooperative_name'   => $cooperative_name,
            // 'cooperative_code'  =>$cooperative_code,
            // 'email'             => $email,  
            // 'amount'            => $amount,       
            // );
        // Mail::to('info@lascocomart.com')->send(new RequestFundEmail($data)); 
        }
        return redirect()->back()->with('success', 'Delivered!');
   }


   public function fmcgOrderDelivered($id, $product_id){
    $email = Auth::user()->email;
    $buyer_id =  User::Join('orders', 'orders.user_id', '=', 'users.id')
    ->where('orders.id', $id)
    ->get('users.id');
    //dd($buyer_id);

    $delivered = OrderItem::where('id', $id)
    ->where('seller_id', Auth::user()->id)
    ->update(['delivery_status' => 'delivered',
            'delivery_date'=> Carbon::now()
            ]);

    $getProduct = FcmgProduct::Join('order_items', 'order_items.product_id', '=', 'fmcg_products.id')
    ->where('fmcg_products.id', $product_id)
    ->where('fmcg_products.seller_id', Auth::user()->id)
    ->get('fmcg_products.prod_name');

    foreach($getProduct as $details){
        $product_name = $details->prod_name;
    }
    // $product= Arr::pluck($getProduct, 'prod_name'); // 
    // $product_name = implode('', $product);

    $superadmin = User::where('role_name', '=', 'superadmin')->get();
    $get_superadmin_id =Arr::pluck($superadmin, 'id');
    $superadmin_id = implode('', $get_superadmin_id);

    $notification = new ProductDelivered($product_id, $product_name);
    Notification::send($superadmin, $notification);

     $notification = new ProductDelivered($product_id, $product_name);
     Notification::send($buyer_id, $notification);

    if($delivered){
       // Email notification to Coopmart
        
    }
    return redirect()->back()->with('success', 'Delivered!');
}

public function allProductDeliveredNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\ProductDelivered')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\ProductDelivered')->delete();
    return redirect()->back();
}

public function readAProductDeliveredNotification($id){
   $notification = auth()->user()->unreadNotifications()
   ->where('type', 'App\Notifications\ProductDelivered')
   ->where('id', $id)->first();
   if ($notification) {
        $notification->markAsRead();
   }
   auth()->user()->readNotifications()
   ->where('type', 'App\Notifications\ProductDelivered')
   ->where('id', $id)->delete();
   return redirect()->back();
}

public function orderReceived($id){
    $email = Auth::user()->email;
    $seller_id =  OrderItem::Join('orders', 'orders.id', '=', 'order_items.order_id')
    ->Join('products', 'products.id', '=','order_items.product_id')
    ->Join('users', 'users.id', '=', 'order_items.seller_id')
    ->where('orders.id', $id)
    ->get('users.id');
    //dd($seller_id); 

    $product_id = OrderItem::Join('orders', 'orders.id', '=', 'order_items.order_id')
    ->Join('products', 'products.id', '=','order_items.product_id')
    ->where('orders.id', $id)
    ->get('products.id');
    $product_name = OrderItem::Join('orders', 'orders.id', '=', 'order_items.order_id')
    ->Join('products', 'products.id', '=','order_items.product_id')
    ->where('orders.id', $id)
    ->get('orders.order_number');

    $superadmin = User::where('role_name', '=', 'superadmin')->get();
    $get_superadmin_id =Arr::pluck($superadmin, 'id');
    $superadmin_id = implode('', $get_superadmin_id);

    $received = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
    ->where('order_id', $id)
    ->where('orders.user_id', Auth::user()->id)
    ->update(['received_status' => 'received',
            'received_date'=> Carbon::now()
            ]);

    $notification = new ProductReceived($product_id, $product_name);
    Notification::send($superadmin, $notification);

    if($received){
        // Email notification to LascocoMart
        $data = array(
        'cooperative_name'   => $cooperative_name,
        'cooperative_code'  =>$cooperative_code,
        'email'             => $email,  
        'amount'            => $amount,       
        );
    //Mail::to('info@lascocomart.com')->send(new RequestFundEmail($data)); 
    }
    return redirect()->back()->with('status', 'Received!');
}

public function allProductReceivedNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\ProductReceived')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\ProductReceived')->delete();
    return redirect()->back();
}

public function readAProductReceivedNotification($id){
    $notification = auth()->user()->unreadNotifications()
    ->where('type', 'App\Notifications\ProductReceived')
    ->where('id', $id)->first();
    if ($notification) {
        $notification->markAsRead();
    }
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\ProductReceived')
    ->where('id', $id)->delete();
    return redirect()->back();
}

public function allNewCardPaymentNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewCardPayment')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\NewCardPayment')->delete();
    return redirect()->back();
}

public function readACardPaymentNotification($id){
   $notification = auth()->user()->unreadNotifications()
   ->where('type', 'App\Notifications\NewCardPayment')
   ->where('id', $id)->first();
   if ($notification) {
        $notification->markAsRead();
   } 
   auth()->user()->readNotifications()
   ->where('type', 'App\Notifications\NewCardPayment')
   ->where('id', $id)->delete();
   return redirect('sales_preview');
}

public function readACardPaymentSuperadmin($id){
    $notification = auth()->user()->unreadNotifications()
    ->where('type', 'App\Notifications\NewCardPayment')
    ->where('id', $id)->first();
    if ($notification) {
         $notification->markAsRead();
    } 
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\NewCardPayment')
    ->where('id', $id)->delete();
    return redirect()->back();
 }


public function allNewOrderNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewOrder')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\NewOrder')->delete();
    return redirect()->back();
    
} 
//admin
public function readAnOrderNotification($id){
   $notification = auth()->user()->unreadNotifications()
   ->where('type', 'App\Notifications\NewOrder')
   ->where('id', $id)->first();
   if ($notification) {
        $notification->markAsRead();
   } 
   auth()->user()->readNotifications()
   ->where('type', 'App\Notifications\NewOrder')
   ->where('id', $id)->delete();
   return redirect('admin-order-history');
} 

public function readAnOrderSuperadmin($id){
    $notification = auth()->user()->unreadNotifications()
    ->where('type', 'App\Notifications\NewOrder')
    ->where('id', $id)->first();
    if ($notification) {
         $notification->markAsRead();
    } 
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\NewOrder')
    ->where('id', $id)->delete();
    return redirect()->back();
 }


 public function AdminCancelOrderNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\AdminCancelOrder')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\AdminCancelOrder')->delete();
    return redirect()->back();
}

public function readAdminCancelOrderNotification($id){
    $notification = auth()->user()->unreadNotifications()
    ->where('type', 'App\Notifications\AdminCancelOrder')
    ->where('id', $id)->first();
    if ($notification) {
        $notification->markAsRead();
    }
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\AdminCancelOrder')
    ->where('id', $id)->delete();
    return redirect()->back();
}

public function ApproveFundNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\ApproveFund')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\ApproveFund')->delete();

    return redirect()->back();
}

public function readApproveFundNotification($id){
    $notification = auth()->user()->unreadNotifications()
    ->where('type', 'App\Notifications\ApproveFund')
    ->where('id', $id)->first();
    if ($notification) {
        $notification->markAsRead();
    }
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\ApproveFund')
    ->where('id', $id)->delete();
    return redirect()->back();
}

public function CancelFundNotification(){
    Auth::user()->unreadNotifications->where('type', 'App\Notifications\CancelFundRequest')->markAsRead();
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\CancelFundRequest')->delete();

    return redirect()->back();
}

public function readCancelFundNotification($id){
    $notification = auth()->user()->unreadNotifications()
    ->where('type', 'App\Notifications\CancelFundRequest')
    ->where('id', $id)->first();
    if ($notification) {
        $notification->markAsRead();
    }
    auth()->user()->readNotifications()
    ->where('type', 'App\Notifications\CancelFundRequest')
    ->where('id', $id)->delete();
    return redirect()->back();
}

public function fundRequestNotification($id){
    $notification = auth()->user()->unreadNotifications()->where('id', $id)->first();
    if ($notification) {
         $notification->markAsRead();
    }
    // return redirect()->back();
    $fund =  \DB::table('users')->Join('fund_request', 'fund_request.user_id', '=', 'users.id')
    ->where('fund_request.admin_id', Auth::user()->id)
    ->where('fund_request.status', 'pending')
    ->orderBy('fund_request.created_at', 'desc')
     ->get([
        'fund_request.*', 
        'users.email', 
        'users.fname', 
        'users.lname',
        'users.coopname',
        'users.phone'
    ]);
     if($fund){
        auth()->user()->readNotifications()->where('id', $id)->delete();
     }

     return view('fundrequest', compact('fund'));

}

}