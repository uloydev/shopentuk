<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'product_id',
        'is_main_image',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    // url mutator
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = base64_encode($value);
    }

    public function getUrlAttribute()
    {
        return base64_decode($this->attributes['url']);
    }
}
