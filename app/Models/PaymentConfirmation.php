<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'order_id',
        'payment_date',
        'payment_method',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function image()
    {
        return $this->hasOne('App\Models\PaymentConfirmationImage');
    }
}
