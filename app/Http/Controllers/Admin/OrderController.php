<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Models\Order;
use App\Models\Refund;
use App\Models\SiteSetting;

use App\Mail\OrderRejected;
use App\Mail\OrderRefunded;

class OrderController extends Controller
{
    private $completedOrderStatus = ['finished', 'canceled', 'refunded'];

    public function index()
    {
        return view('order.manage', [
            'orders' => Order::whereIn('status', $this->completedOrderStatus)->get(), 
            'title' => 'manage order'
        ]);
    }

    public function newOrder()
    {
        $orderPaid = Order::where('status', 'paid')->get();
        $orderUnpaid = Order::where('status', 'unpaid')->get();
        
        return view('order.new', [
            'orderPaid' => $orderPaid,
            'orderUnpaid' => $orderUnpaid,
            'title' => 'latest order'
        ]);
    }

    public function rejectOrder(Order $order)
    {
        if ($order->status != 'paid') {
            return redirect()->back()->with('error', 'order tidak bisa di reject');
        }
        $order->status = 'refunded';
        $order->save();
        $user = $order->user;
        Mail::to($user->email)->send(new OrderRejected($user, $order));
        return redirect()->back()->with('success', 'order ditolak');
    }

    public function orderToRefund()
    {
        $orders = Order::where('status', 'refunded')->doesntHave('refund')->get();
        return view('order.refund', [
            'orders' => $orders,
        ]);
    }

    public function showRefundForm(Order $order)
    {
        return view('order.refund-form', [
            'order' => $order,
        ]);
    }

    public function makeRefund(Order $order, Request $request)
    {
        // payment_method = ['bca', 'ovo', 'point']

        $siteSetting = SiteSetting::first();
        $user = $order->user;
        $refund = new Refund;

        $refund->full_name = $user->name;
        $refund->phone = $user->phone;
        $refund->order_id = $order->id;
        $refund->payment_method = $request->payment_method;
        if ($request->hasFile('image')) {
            $refund->image = $request->file('image')->store('refund_images');
        }

        if ($request->paymentMethod == 'point') {
            $refund->payment_date = Carbon::now();
            $user->point += round($order->price_total / $siteSetting->point_value);
            $user->point += $order->point_total;
        } else {
            $refund->payment_date = Carbon::parse($request->payment_date);
        }
        $refund->save();
        $user->save();
        Mail::to($user->email)->send(new OrderRefunded($user, $order));

        return redirect()->route('admin.order.refund.index')->with(
            'success',
            'sukses refund order!'
        );
    }

    public function changeStatus(Order $order)
    {
        $order->update([
            'status' => 'paid'
        ]);
        return redirect()->back()->with(
            'success',
            'Successfully change status for order with ID' . $order->id
        );
    }

    public function cancel(Order $order)
    {
        $order->user->email = 'bariq.2nd.rodriguez@gmail.com';

        // dd($order->user->email, env('MAIL_USERNAME'));

        $order->update([
            'status' => 'refunding'
        ]);

        // $user = $order->user;
        Mail::to($order->user->email)->send(new OrderRefunded($order));

        return redirect()->route('admin.order.new')->with('success', 'Successfully cancel order');
    }
}
