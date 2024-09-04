<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Review;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Loggable, SoftDeletes;
    
     protected $fillable = [
        'cat_id', 'prod_name', 'quantity', 'prod_brand', 'description',  'old_price', 'price',  'image', 
        'img1', 'img2', 'img3', 'img4', 'user_id', 'status'
    ];
    protected $guarded=['id'];
   
    public function order() {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasOne(Review::class,'product_id');
    }

    public function children(){
        return $this->hasMany('App\Models\Review');
    }

    
    
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo{
        return $this->belongsTo(User::class,'user_id', 'id');
        }

    
}
