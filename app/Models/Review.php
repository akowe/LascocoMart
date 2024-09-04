<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Review extends Model
{
    use HasFactory, Loggable;

    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'product_id',
        'reviews',
        'rating'
        ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function review(){
        return $this->belongsTo(Review::class, 'user_id','user_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    
}
