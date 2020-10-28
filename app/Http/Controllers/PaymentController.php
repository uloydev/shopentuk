<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function confirm()
    {
        return view('payment.confirm', ['title' => 'Konfirmasi pembayaran']);
    }
}
