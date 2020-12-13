<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'point',
        'bank',
        'rekening',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userAddresses()
    {
        return $this->hasMany('App\Models\UserAddress');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function cart()
    {
        return $this->hasOne('App\Models\Cart');
    }

    public function getMainAddressAttribute()
    {
        $address = $this->userAddresses()->where('is_main_address', true)->first();
        if (!$address) {
            $address = $this->userAddresses()->first();
        }
        return $address;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y') ?? '-';
    }
}
