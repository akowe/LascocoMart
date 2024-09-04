<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

     protected $fillable = [
        'cat_id', 'cat_name', 'cat_description'
    ];

// select all categories
 public function categories()
    {
        return $this->hasOne(Categories::class);
    }
}
