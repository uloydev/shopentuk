<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showConfirm()
    {
        return view('payment.confirm', ['title' => 'Konfirmasi pembayaran']);
    }

    public function cart()
    {
        return view('payment.cart', ['title' => 'cart']);
    }
}
