<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = PaymentConfirmation::with(['image'])->whereHas('order', function ($query) {
            $query->where('status', 'unpaid');
        })->latest()->get();
        return view('payment.manage')->with([
            'payments' => $payments,
            'title' => 'manage payment confiramtion',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentConfirmation  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentConfirmation $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentConfirmation  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentConfirmation $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentConfirmation  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentConfirmation $payment)
    {
        if ($request->boolean('is_accepted')) {
            $payment->order->update([
                'status' => 'paid',
            ]);
            return redirect()->route('admin.payment.index')->with([
                'success' => 'berhasil menerima order',
            ]);
        } else {
            Storage::delete($payment->image->file);
            $payment->image->delete();
            $payment->delete();
            return redirect()->route('admin.payment.index')->with([
                'success' => 'berhasil menolak pembayaran',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentConfirmation  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentConfirmation $payment)
    {
        //
    }
}
