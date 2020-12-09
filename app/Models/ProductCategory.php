<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_digital_product',
    ];

    public function productSubCategory()
    {
        return $this->hasMany('App\Models\ProductSubCategory', 'category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }

    // image_url mutator
    // public function setImageAttribute($value)
    // {
    //     $this->attributes['image'] = base64_encode($value);
    // }

    // public function getImageAttribute()
    // {
    //     return base64_decode($this->attributes['image']);
    // }
}
