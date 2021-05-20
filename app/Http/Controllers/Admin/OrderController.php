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
use App\Models\PointHistory;

use App\Mail\OrderRejected;
use App\Mail\RefundReceipt;
use App\Mail\OrderRefunded;

class OrderController extends Controller
{
    private $completedOrderStatus = ['finished', 'canceled', 'refunded'];

    public function index()
    {
        return view('order.history', [
            'orders' => Order::whereIn('status', $this->completedOrderStatus)->get(), 
            'title' => 'manage order'
        ]);
    }

    public function newOrder()
    {
        $orderPaid = Order::whereIn('status', ['paid', 'shipping'])->get();
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
        $user = $order->user;
        // dd($user->email);
        if ($order->price_total == 0) {
            $order->update([
                'status' => 'refunded',
                'refund_method' => 'point'
            ]);
            $user->point += $order->point_total;
            $user->save();
            PointHistory::create([
                'value' => $order->point_total,
                'description' => PointHistory::ORDER_POINT_REFUND_MESSAGE,
                'user_id' => $user->id
            ]);
            Mail::to($user->email)->send(new RefundReceipt($order));
        } else {
            $order->update([
                'status' => 'refunding'
            ]);
            Mail::to($user->email)->send(new OrderRefunded($order));
        }
        return redirect()->route('admin.order.new')->with('success', 'Successfully cancel order');
    }

    public function submitVoucherCode(Request $request, Order $order) {
        foreach ($request->order_product_id as $index => $id) {
            $orderItem = $order->orderProducts->firstWhere('id', $id);
            $orderItem->voucher_code = $request->voucher_code[$index];
            $orderItem->save();
        }
        if ($order->orderProducts->where('is_digital', false)->count()) {
            if ( ! empty($order->no_resi) ) {
                $order->update([
                    'status' => 'shipping'
                ]);
            }
        } else {
            $user = $order->user;
            $bonusPoint = $order->orderProducts->sum(function($orderItem) {
                return $orderItem->product->point_bonus;
            });
            PointHistory::create([
                'value' => $bonusPoint,
                'description' => PointHistory::ORDER_REWARD_MESSAGE,
                'user_id' => $order->user_id,
            ]);
            $order->update([
                'status' => 'finished'
            ]);
            $user->point += $bonusPoint;
            $user->save()
        }
        return redirect()->route('admin.order.new')->with('success', 'Successfully submit  voucher code');
    } 
}
