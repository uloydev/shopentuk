<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $with = ['discount'];
    protected $fillable = [
        'title',
        'description',
        'price',
        'point_price',
        'category_id',
        'sub_category_id',
        'is_redeem',
    ];

    /**
     * Set the product name to lowercase when store to db
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the product desc to lowercase when store to db
     *
     * @param  string  $value
     * @return void
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtolower($value);
    }

    public function productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id')->withDefault();
    }

    public function productSubCategory()
    {
        return $this->belongsTo('App\Models\ProductSubCategory', 'sub_category_id')->withDefault();
    }

    public function discount()
    {
        return $this->hasOne('App\Models\ProductDiscount');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function mainImage()
    {
        return $this->hasOne('App\Models\ProductImage')->where('is_main_image', true);
    }
}
