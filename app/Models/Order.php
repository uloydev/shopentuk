<?php

namespace App\Models;

use Database\factories\NewOrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', //done
        'user_address_id',
        'shipping_price', //done
        'shipping_point', //done
        'product_price', //done
        'product_point', // done
        'price_total', //done
        'point_total', //done
        'weight_total', //done
        'voucher_discount', //done
        'status', //done
        'no_resi', //done
    ];

    public function orderProducts()
    {
        return $this->hasMany('App\Models\OrderProduct');
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
        return $this->hasOne('App\Models\PaymentConfirmation');
    }

    public function userAddress()
    {
        return $this->belongsTo('App\Models\UserAddress');
    }

    public function pointHistory()
    {
        return $this->hasOne('App\Models\PointHistory');
    }
}
