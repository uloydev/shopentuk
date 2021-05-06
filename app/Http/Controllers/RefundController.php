<?php

namespace App\Http\Controllers;

use App\Mail\RefundReceipt;
use App\Mail\RequestRefund;
use App\Models\Order;
use App\Models\Refund;
use App\Models\User;
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

    public function request(Order $order)
    {
        $order->update([
            'refund_method' => request('refund_method')
        ]);

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
        $refundReceipt = Refund::create([
            'user_id' => request('user_id'),
            'order_id' => request('order_id'),
            'payment_date' => request('payment_date'),
            'struk' => request('struk')->store('public/refund')
        ]);

        $emailCustomer = User::findOrFail(request('user_id'))->email;

        Mail::to($emailCustomer)->send(
            new RefundReceipt($refundReceipt)
        );

        Order::where('id', $refundReceipt->order_id)->update([
            'status' => 'refunded'
        ]);

        return redirect()->back()->with('success', 'Successfully refund order to custoemr');
    }
}
