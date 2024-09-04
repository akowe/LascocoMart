<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CooperativeMemberRole extends Model
{
    use HasFactory;
    protected $table = 'cooperative_role';
    protected $fillable = [
        'member_id', 'cooperative_code', 'member_role', 'member_role_name',
    ];
}
