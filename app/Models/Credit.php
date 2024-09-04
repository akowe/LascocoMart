<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Credit extends Model
{
    use HasFactory, Loggable;
    protected $fillable = [
        'user_id', 'member_name', 'credit'
    ];
}
