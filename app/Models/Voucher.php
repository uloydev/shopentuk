<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code', 
        'discount_value',
        'expired_at'
    ];

    protected $casts = [
        'expired_at' => 'datetime'
    ];

    public function getFormattedExpiredTimeAttribute()
    {
        $expired = Carbon::parse($this->attributes['expired_at']);
        return $expired->format('Y-m-d'). 'T' .$expired->format('h:i');
    }
}
