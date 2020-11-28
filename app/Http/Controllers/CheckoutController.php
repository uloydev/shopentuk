<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\SiteSetting;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $siteSetting = SiteSetting::first();
        $user = Auth::user();
        // $user->point  = 100;
        // $user->save();
        // return redirect()->back()->with(['error' => 'point kamu gak cukup buat order!']);
        $cart = $user->cart;
        $isAllPoint = $cart->cartItems->where('is_toko_point', false)->count() == 0;

        if ($cart->total_point > $user->point) {
            return redirect()->back()->with(['error' => 'point kamu gak cukup buat order!']);
        }

        $order = new Order();
        $order->user_id = $user->id;
        $order->user_address_id = $request->address_id;
        $order->product_price = $cart->total_price;
        $order->product_point = $cart->total_point;
        if ($isAllPoint) {
            $order->shipping_point = $siteSetting->shipping_price / $siteSetting->point_value;
            $order->shipping_price = 0;
            $order->status = 'paid';
        } else {
            $order->shipping_price = $siteSetting->shipping_price;
            $order->shipping_point = 0;
            $order->status = 'unpaid';
        }
        $order->price_total = $order->product_price + $order->shipping_price;
        $order->point_total = $order->product_point + $order->shipping_point;
        $order->save();

        foreach($cart->cartItems as $item) {
            $itemProduct = $item->product;
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item->product_id;
            $orderProduct->point_price = $itemProduct->point_price;
            $orderProduct->original_price = $item->product->price;
            if (!empty($itemProduct->discount)) {
                $orderProduct->discounted_price = $itemProduct->discount->discounted_price;
            }
            $orderProduct->quantity = $item->quantity;
            $orderProduct->is_toko_point = $item->is_toko_point;
            $orderProduct->save();
            $item->delete();
        }
        return redirect()->route('my-account.current.order')->with([
            'success' => 'sukses membuat order' . !$isAllPoint ? ", silahkan bayar pesanan anda !" : "",
        ]);
    }
}
