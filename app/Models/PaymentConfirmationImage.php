<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmationImage extends Model
{
    use HasFactory;

    protected $fillable= [
        'file',
        'payment_confirmation_id',
    ];

    public function paymentConfirmation()
    {
        return $this->belongsTo('App\Models\PaymentConfirmation');
    }
}
