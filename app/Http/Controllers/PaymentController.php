<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showConfirm()
    {
        return view('payment.confirm', ['title' => 'Konfirmasi pembayaran']);
    }

    public function showReturning()
    {
        return view('payment.returning', ['title' => 'Pengembalian uang']);
    }
}
