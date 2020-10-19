<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['discount'];

    protected $fillable = [
        'name',
        'description',
        'price',
        'token_price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function discount()
    {
        return $this->hasOne('App\Models\ProductDiscount');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function mainImage()
    {
        return $this->hasOne('App\Models\ProductImage')->where('is_main_image', true);
    }
}
