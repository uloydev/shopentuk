<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;

class DashboardController extends Controller
{

    protected $tabMenus = [
        'history order',
        'current order',
        'account detail',
        'point history',
        'product favorite'
    ];

    public function currentOrder()
    {
        return view('customer.order.current', [
            'title' => 'current order',
            'tabMenus' => $this->tabMenus,
            'orders' => Auth::user()->orders->whereNotIn('status', [
                'canceled', 'refunded', 'finished'
            ])
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
            'labelInput' => ['name', 'email', 'phone', 'bank', 'pemilik rekening', 'rekening'],
            'userData' => [
                $user->name,
                $user->email,
                $user->phone,
                $user->bank,
                $user->pemilik_rekening,
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
        return redirect()->back()->with(['success' => 'Successfully update user data']);
    }

    public function wishlistProduct()
    {
        $favoriteProduct = FavoriteProduct::all();
        $title = 'My wishlist';
        $tabMenus = $this->tabMenus;
        return view('customer.account.wishlist', get_defined_vars());
    }

    public function storeWishlist(FavoriteProduct $favoriteProduct)
    {
        $favoriteProduct->create([
            'product_id' => request('product_id'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Successfully add product to your favorite');
    }

    public function removeWishlist(FavoriteProduct $favoriteProduct)
    {
        $favoriteProduct->delete();
        return redirect()->back()->with(
            'success',
            'Successfully remove product from your favorite'
        );
    }

    public function cancelBeforePaid(Order $order)
    {
        $order->update([
            'status' => 'canceled'
        ]);

        return redirect()->back()->with('success', 'Successfully cancel order');
    }

    public function finishOrder(Order $order)
    {
        $order->update([
            'status' => 'finished'
        ]);

        return redirect()->back()->with(
            'success', 'Thank you for ordering, your order is now finished'
        );
    }
}
