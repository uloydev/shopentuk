<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'dicounted_price',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
