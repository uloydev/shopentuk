<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $tabMenus = ['order history', 'current order', 'account detail', 'my point'];
        return view('customer.dashboard', [
            'title' => 'my dashboard',
            'userDetail' => Auth::user(),
            'tabMenus' => $tabMenus
        ]);
    }
}
