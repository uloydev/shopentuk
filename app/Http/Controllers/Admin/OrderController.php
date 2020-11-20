<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', ['orders' => Order::all()]);
    }

    public function newOrder()
    {
        // $orders = Order::where('status' => )
        // return view('admin.order.new', ['orders' => ]);
    }
}
