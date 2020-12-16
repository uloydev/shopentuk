<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;

class DashboardController extends Controller
{

    protected $tabMenus = ['history order', 'current order', 'account detail', 'point history'];

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
        $user = auth()->user();
        $userAddresses = $user->userAddresses;
        // dd($userAddresses);
        return view('customer.account.detail', [
            'title' => 'my dashboard',
            'tabMenus' => $this->tabMenus,
            'labelInput' => ['name', 'email', 'phone', 'bank', 'rekening'],
            'userData' => [
                $user->name,
                $user->email,
                $user->phone,
                $user->bank,
                $user->rekening
            ],
            'userAddresses' => $userAddresses,
            'provinces' => Province::all(),
        ]);
    }

    public function pointHistory()
    {
        return view('customer.account.my-point', [
            'title' => 'my point',
            'tabMenus' => $this->tabMenus,
            'history' => Auth::user()->pointHistory,
        ]);
    }

    public function updateAccount(Request $request)
    {
        Auth::user()->update($request->all());
        return redirect()->back()->with(['success' => 'data user berhasil diupdate!']);
    }
}
