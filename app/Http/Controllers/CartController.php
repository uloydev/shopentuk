<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\FavoriteProduct;
use App\Models\SiteSetting;
use App\Models\UserAddress;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $siteSetting;

    public function __construct()
    {
        $this->middleware(['auth', 'customer']);
        $this->siteSetting = SiteSetting::first();
    }

    public function index()
    {
        $pointTotal = 0;
        $priceTotal = 0;
        $weightTotal = 0;

        $user = Auth::user();
        $cart = $user->cart;
        // dd($cart->cartItems->first()->product);
        $addresses = $user->userAddresses->sortByDesc('is_main_address');

        $userAddress = new UserAddress();
        //get all column on UserAddress except user_id, bcz user_id is not on backend
        $addressColumnExceptUserId = array_diff($userAddress->getFillable(), ['user_id']);

        // this is just for html attributes needed, doesn't affect to backend
        $inputIds = array_map(function ($label) {
            return Str::kebab($label);
        }, $addressColumnExceptUserId);
        $inputText = array_map(function ($text) {
            return Str::of($text)->replace('_', ' ')->title();
        }, $addressColumnExceptUserId);

        if ($cart && $cart->cartItems->count() > 0) {
            foreach ($cart->cartItems as $item) {
                if ($item->is_toko_point) {
                    $pointTotal += $item->product->point_price * $item->quantity;
                } else {
                    $priceTotal += $item->product->price * $item->quantity;
                }
                if (!$item->product->productCategory->is_digital_product) {
                    $weightTotal += $item->product->weight * $item->quantity;
                }
            }
        }

        $yourFavorite = FavoriteProduct::where('user_id', auth()->id())->pluck('id');

        return view('payment.cart', [
            'title' => 'cart',
            'cart' => $cart,
            'siteSetting' => $this->siteSetting,
            'weightTotal' => $weightTotal,
            'pointTotal' => $pointTotal,
            'priceTotal' => $priceTotal,
            'addresses' => $addresses,
            'addressColumn' => $addressColumnExceptUserId,
            'inputIds' => $inputIds,
            'inputText' => $inputText,
            'provinces' => Province::all(),
            'yourFavorite' => $yourFavorite
        ]);
    }

    public function store(Request $request)
    {
        if ($request->has('product_id')) {
            $product = Product::findOrFail($request->product_id);
            $cart = Cart::where('user_id', Auth::id())->firstOrCreate([
                'user_id' => Auth::id(),
            ]);
            $cartItem = CartItem::firstOrNew([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'is_toko_point' => (bool) $request->is_toko_point,
            ]);
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        }
        return redirect()->back()->with(['success' => 'berhasil menambahkan produk kedalam keranjang']);
    }

    public function update(Cart $cart, Request $request)
    {
        foreach ($request->all() as $data) {
            if ($data['quantity'] != 0) {
                CartItem::find($data['item_id'])->update(['quantity' => $data['quantity']]);
            }
        }
        return 'ok';
    }

    public function destroy(Cart $cart, Request $request)
    {
        CartItem::find($request->item_id)->delete();
        return 'ok';
    }
}
