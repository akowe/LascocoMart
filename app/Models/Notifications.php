<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Prunable;

class Notifications extends Model
{
    use HasFactory, Prunable;
    protected $table='notifications';
  

    public function prunable()
    {
        return static::whereNotNull('read_at')
            ->where('read_at', '<=', now()->subDays(7));
    }

    public static function boot() {
        parent::boot();

        return static::whereNotNull('read_at')
            ->where('read_at', '<=', now()->subDays(7))->delete();
    }
}
