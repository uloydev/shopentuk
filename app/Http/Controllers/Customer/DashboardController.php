<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $tabMenus = ['history order', 'current order', 'account detail', 'account point'];

    public function currentOrder()
    {
        return view('customer.order.current', [
            'title' => 'current order',
            'tabMenus' => $this->tabMenus,
            'orders' => Auth::user()->orders->whereNotIn('status', ['canceled', 'refunded', 'finished'])
        ]);
    }

    public function orderHistory()
    {
        return view('customer.order.history', [
            'title' => 'order history', 
            'tabMenus' => $this->tabMenus,
            'orders' => Auth::user()->orders->whereIn('status', ['canceled', 'refunded', 'finished'])
        ]);
    }

    public function accountDetail()
    {
        $user = Auth::user();
        // dd($user->userAddresses->toJson());
        return view('customer.account.detail', [
            'title' => 'my dashboard',
            'tabMenus' => $this->tabMenus,
            'labelInput' => ['full name', 'email', 'phone number', 'bank', 'no rekening'],
            'userData' => [
                $user->name, 
                $user->email, 
                substr($user->phone, 3),
                $user->bank,
                $user->rekening
            ],
            'userAddresses' => $user->userAddresses,
        ]);
    }

    public function accountPoint()
    {
        return view('customer.account.my-point', [
            'title' => 'my point',
            'tabMenus' => $this->tabMenus
        ]);
    }
}
