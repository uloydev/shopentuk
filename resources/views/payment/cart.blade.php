@extends('layouts.master')

@section('title', ucfirst($title))

@section('body-id', $title)

@section('content')
<div class="container h-full pt-10 pb-20 px-5 mx-auto">
    {{-- alert --}}
    @if(session('error'))
    <div class="flex items-center bg-red-600 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
        </svg>
        <p>{{ session('error') }}</p>
    </div>
    @endif
    @if (isset($cart) && $cart->cartItems->count() > 0)
        <div class="border-b border-gray-400 flex justify-between pb-5 font-bold">
            <h1>Order</h1>
            <p>Price</p>
        </div>
        <div class="grid grid-cols-1 divide-y divide-gray-300">
            @foreach ($cart->cartItems as $item)
                <div class="py-10 cart-item">
                    <figure class="flex flex-wrap items-center">
                        <img src="{{ asset('storage/' . $item->product->mainImage->url) }}" 
                        alt="Product on cart" class="h-24 mx-auto">
                        <figcaption class="p-3 flex-grow flex flex-col lg:flex-row lg:justify-between">
                            <div class="mb-5 lg:mb-0">
                                <p class="mb-2">Item {{ $item->product->title }}</p>
                                <p class="text-sm text-gray-700">
                                    {{ $item->product->category->title ?? '' }}
                                </p>
                            </div>
                            <div>
                                @if ($item->is_toko_point)
                                    <var class="cart-item__price not-italic ml-3"
                                    data-price="{{ $item->product->point_price }}" 
                                    data-init-price="{{ $item->product->point_price }}" 
                                    data-is-point="true">
                                        {{ $item->product->point_price * $item->quantity }} point
                                    </var>
                                @else
                                    @if (!empty($item->product->discount))
                                        <var class="rupiah-currency cart-item__price not-italic ml-3"
                                        data-price="{{ $item->product->discount->discounted_price }}" data-is-point="false"
                                        data-init-price="{{ $item->product->discount->discounted_price }}">
                                            {{ $item->product->discount->discounted_price  * $item->quantity}}
                                        </var>
                                    @else
                                        <var class="rupiah-currency cart-item__price not-italic ml-3"
                                        data-price="{{ $item->product->price }}" data-is-point="false"
                                        data-init-price="{{ $item->product->price }}">
                                            {{ $item->product->price  * $item->quantity}}
                                        </var>
                                    @endif
                                @endif
                                <input type="number" name="qty" value="{{ $item->quantity }}" 
                                min="1" max="99" data-item-id="{{ $item->id }}" 
                                class="cart-item__qty appearance-none text-center h-8 w-8 lg:w-12
                                bg-white border border-gray-300" required>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            <ul class="mb-3">
                <li class="py-3 flex justify-between items-center">
                    <span>Sub total : </span>
                    <var class="not-italic font-bold rupiah-currency" id="cart__sub-total">
                        {{ $priceTotal }}
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Shipping: </span>
                    @if ($cart->cartItems->where('is_toko_point', false)->count() == 0)
                        <var class="font-bold" id="cart__shipping"
                        data-price="{{ $siteSetting->shipping_price / $siteSetting->point_value}}">
                        {{ $siteSetting->shipping_price / $siteSetting->point_value }} point
                        </var>
                    @else
                        <var class="font-bold rupiah-currency" id="cart__shipping"
                        data-price="{{ $siteSetting->shipping_price }}">
                        {{ $siteSetting->shipping_price }}
                        </var>
                    @endif
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Point total: </span>
                    @if ($cart->cartItems->where('is_toko_point', false)->count() == 0)
                        <var class="not-italic font-bold" id="cart__total-point">
                            {{ $pointTotal + ($siteSetting->shipping_price / $siteSetting->point_value) }} point
                        </var>
                    @else
                        <var class="not-italic font-bold" id="cart__total-point">
                            {{ $pointTotal }} point
                        </var>
                    @endif
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Price Total: </span>
                    @if ($cart->cartItems->where('is_toko_point', false)->count() == 0)
                        <var class="font-bold rupiah-currency" id="cart__total-money">
                            {{ $priceTotal}}
                        </var>
                    @else
                        <var class="font-bold rupiah-currency" id="cart__total-money">
                            {{ $priceTotal + $siteSetting->shipping_price }}
                        </var>
                    @endif
                </li>
            </ul>
        </div>
        <div class="flex justify-center items-center flex-col lg:flex-row">
            <div class="lg:mr-auto flex items-center text-xs justify-between w-full mb-3 lg:mb-0">
                <a href="{{ url()->previous() }}" id="test"
                class="btn-outline hpver:bg-blue-600 border-blue-500 text-blue-500 
                hover:bg-blue-500 hover:text-white">
                    <box-icon name='left-arrow-alt' class="text-blue-500 hover:text-white"></box-icon>
                    Kembali
                </a>
                <x-btn-primary type="button" text="Perbarui keranjang" 
                id="updateCartBtn" data-cart-id="{{ Auth::user()->cart->id }}"
                class="border-gray-500 hover:border-gray-900 flex items-center lg:mr-3">
                    <box-icon name='refresh' class="mr-1" animation="tada-hover"></box-icon>
                </x-btn-primary>
            </div>
            <x-btn-primary text="Lanjutkan checkout" id="btnShowCheckoutStep"
            class="btn bg-teal-500 active:bg-teal-800 hover:bg-teal-600 border-teal-700
            w-full justify-center"/>
        </div>

        @include('payment.step-checkout')
        @include('payment.add-new-address', ['columns' => $addressColumn])

    @else
        @include('payment.no-item')
    @endif

    
</div>
@endsection