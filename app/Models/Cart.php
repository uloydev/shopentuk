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
            if ($item->has('discount')) {
                $price += $item->product->discount->discounted_price * $item->quantity;
            } else {
                $price += $item->product->price * $item->quantity;
            }
        }
        return $price;
    }
}
