<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_address_id',
        'shipping_price',
        'product_price',
        'grand_total',
        'status',
    ];

    public function OrderProducts()
    {
        return $this->hasMany('Appp\Models\OrderPorduct');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function refund()
    {
        return $this->hasOne('App\Models\Refund');
    }

    public function paymentConfirmation()
    {
        return $this->hasOne('App\Models\Refund')->where('is_confirmed', true);
    }

    public function userAddress()
    {
        return $this->belongsTo('App\Models\UserAddress');
    }
}
