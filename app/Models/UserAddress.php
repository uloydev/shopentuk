<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'email',
        'phone',
        'street_address',
        'kelurahan',
        'kecamatan',
        'city',
        'province',
        'postal_code',
        'is_main_address',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
