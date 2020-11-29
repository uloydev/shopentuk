<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentConfirmation;
use App\Models\PaymentConfirmationImage;

class PaymentController extends Controller
{
    public function showConfirm(Request $request)
    {
        return view('payment.confirm', [
            'title' => 'Konfirmasi pembayaran',
            'order_id' => $request->order_id
        ]);
    }

    public function showReturning()
    {
        return view('payment.returning', ['title' => 'Pengembalian uang']);
    }

    public function store(Request $request)
    {
        $paymentConfirmation = PaymentConfirmation::create($request->only([
            'full_name', 
            'phone', 
            'order_id', 
            'payment_date', 
            'payment_method'
        ]));
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $item) {
                $paymentImage = $item->store('payment-confirmation');
                PaymentConfirmationImage::create([
                    'file' => $paymentImage,
                    'payment_confirmation_id' => $paymentConfirmation->id
                ]);
            }
        }
        return redirect()->back()->with(['success' => 'sukses membuat konfirmasi pembayaran']);
    }
}
