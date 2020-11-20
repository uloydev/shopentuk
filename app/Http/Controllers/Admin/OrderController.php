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
        return view('admin.order.index', ['orders' => Order::all()]);
    }

    public function newOrder()
    {
        $orders = Order::whereIn('status', ['paid', 'unpaid'])->get();
        return view('admin.order.new', ['orders' => $orders]);
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
        return redirect()->back()->with('success', 'order berhasil ditolak');
    }

    public function orderToRefund()
    {
        $orders = Order::where('status', 'refunded')->doesntHave('refund')->get();
        return view('adnmin.order.need-to-refund', [
            'orders' => $orders,
        ]);
    }

    public function showRefundForm(Order $order)
    {
        return view('admin.order.refund-form', [
            'order' => $order,
        ]);
    }

    public function makeRefund(Order $order, Request $request)
    {
        // payment_method = ['bca', 'ovo', 'point']
        
        $siteSetting = SiteSetting::first();
        $user = $order->user;
        $refund = new Refund();
        
        $refund->full_name = $user->name;
        $refund->phone = $user->phone;
        $refund->order_id = $order->id;
        $refund->payment_method = $request->payment_method;
        if ($request->hasFile('image')) {
            $refund->image = $request->file('image')->store('refund_images');
        }
        
        if($request->paymentMethod == 'point'){
            $refund->payment_date = Carbon::now();
            $user->point += round($order->price_total / $siteSetting->point_value);
            $user->point += $order->point_total;
        }else{
            $refund->payment_date = Carbon::parse($request->payment_date);
        }
        $refund->save();
        $user->save();
        Mail::to($user->email)->send(new OrderRefunded($user, $order));

        return redirect()->route('admin.order.need-to-refund')
        ->with('success', 'sukses refund order!');
    }
}
