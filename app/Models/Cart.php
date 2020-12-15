<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $appends = [
        'total_price',
        'total_point',
        'total_weight'
    ];

    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getTotalPointAttribute() {
        $point = 0;
        foreach ($this->cartItems->where('is_toko_point', true) as $item) {
            $point += $item->product->point_price * $item->quantity;
        }
        return $point;
    }

    public function getTotalPriceAttribute() {
        $price = 0;
        foreach ($this->cartItems->where('is_toko_point', false) as $item) {
            if (!empty($item->product->discount)) {
                $price += $item->product->discount->discounted_price * $item->quantity;
            } else {
                $price += $item->product->price * $item->quantity;
            }
        }
        return $price;
    }

    public function getTotalWeightAttribute() {
        $weight = 0;
        foreach ($this->cartItems as $item) {
            if (!$item->product->productCategory->is_digital_product) {
                $weight += $item->product->weight * $item->quantity;
            }
        }
        return $weight;
    }
}
