<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $appends = ['province', 'is_java'];

    protected $fillable = [
        'title',
        'name',
        'email',
        'phone',
        'street_address',
        // 'kelurahan',
        // 'kecamatan',
        // 'city',
        // 'postal_code',
        'province_id',
        'is_main_address',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function provinceData()
    {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }

    public function getProvinceAttribute()
    {
        return $this->provinceData->name;
    }

    public function getIsJavaAttribute()
    {
        return $this->provinceData->is_java;
    }
}
