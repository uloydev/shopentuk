<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function productCategory()
    {
        return $this->belogsTo('App\Models\ProductCategory', 'category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'sub_category_id');
    }
}
