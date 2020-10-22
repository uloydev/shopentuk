<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function productSubCategory()
    {
        return $this->hasMany('App\Models\ProductSubCategory', 'category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}
