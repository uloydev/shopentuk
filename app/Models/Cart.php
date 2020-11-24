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
}
