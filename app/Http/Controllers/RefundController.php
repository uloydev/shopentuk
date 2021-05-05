<?php

namespace App\Http\Controllers;

use App\Mail\RequestRefund;
use App\Models\Order;
use App\Models\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RefundController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer')->only('request');
        $this->middleware('admin')->only('manage');
    }

    public function request($orderId)
    {
        $orderToRefund = Order::where('id', $orderId)->firstOrFail();
        $userId = $orderToRefund->user->id;
        $paymentDate = Carbon::now()->toDateTimeString();

        $requestRefund = Refund::create([
            'user_id' => $userId,
            'order_id' => $orderId,
            'payment_date' => $paymentDate,
            'rekening' => (int)request('rekening'),
            'payment_method' => request('payment_method')
        ]);

        Mail::to('bariq.2nd.rodriguez@gmail.com')->send(new RequestRefund($requestRefund));

        return redirect()->back()->with(
            'success', 
            'Berhasil request refund. Mohon tunggu, permintaan mu akan dibalas melalui email'
        );
    }

    public function manage()
    {
        $title = 'Refund Request From Customer';
        $orderToRefund = Order::where('status', 'refunding')->get();
        return view('order.refund', get_defined_vars());
    }

    public function kirimBukti()
    {
        Refund::create([
            'user_id' => request('user_id'),
            'order_id' => request('order_id'),
            'payment_date' => request('payment_date'),
            'is_paid' => request('is_paid'),
            'payment_method' => request('payment_method'),
            'struk' => request('struk')->store('refund')
        ]);

        return redirect()->back()->with('success', 'Successfully refund order to custoemr');
    }
}
