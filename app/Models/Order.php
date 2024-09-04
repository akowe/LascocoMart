<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Order extends Model
{
    use HasFactory, Loggable;
    protected $table = 'orders';
    protected $guarded=['id'];
    
    // public function OrderItem()
    // {
    //     return $this->belongsTo(OrderItem::class, 'order_id'); 
    // }
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function orderitem() {
        return $this->hasMany(OrderItem::class);
    }


}//class
