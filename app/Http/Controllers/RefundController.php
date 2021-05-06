<?php

namespace App\Http\Controllers;

use App\Mail\RefundReceipt;
use App\Models\Order;
use App\Models\PointHistory;
use App\Models\Refund;
use App\Models\User;
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
            'refund_method' => request('refund_method'),
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
            'struk' => request('struk')->store('public/refund'),
        ]);
        $user = User::findOrFail(request('user_id'));

        $order = Order::findOrFail($refundReceipt->order_id);
        $order->update([
            'status' => 'refunded',
        ]);
        $user->point += $order->point_total;
        $user->save();
        PointHistory::create([
            'value' => $order->point_total,
            'description' => PointHistory::ORDER_POINT_REFUND_MESSAGE,
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(
            new RefundReceipt($order)
        );
        return redirect()->back()->with('success', 'Successfully refund order to custoemr');
    }
}
