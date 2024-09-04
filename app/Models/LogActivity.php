<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogActivity extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="log_activity";
    protected $fillable = [
        'subject', 'url', 'method', 'type', 'ip', 'agent', 'user_id'
    ];
}
