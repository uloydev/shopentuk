<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'original_price',
        'point_price',
        'discounted_price',
        'quantity',
        'is_toko_point',
        'is_digital',
        'voucher_code',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product')->withDefault();
    }
}
