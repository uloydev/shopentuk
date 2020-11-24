@extends('layouts.master')

@section('title', ucfirst($title))

@section('body-id', $title)

@section('content')
<div class="container h-full pt-10 pb-20 px-5 mx-auto">
    @if (isset($cart) && $cart->cartItems->count() > 0)
        <div class="border-b border-gray-400 flex justify-between pb-5 font-bold">
            <h1>Order</h1>
            <p>Price</p>
        </div>
        <div class="grid grid-cols-1 divide-y divide-gray-300">
            @foreach ($cart->cartItems as $item)
                <div class="py-10 cart-item">
                    <figure class="flex flex-wrap items-center">
                        <img src="{{ $item->product->mainImage->url }}" alt="Product on cart" class="h-24 mx-auto">
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
                                        {{ $item->product->point_price * $item->quantity . ' Point' }}
                                    </var>
                                @else
                                    <var class="rupiah-currency cart-item__price not-italic ml-3"
                                    data-price="{{ $item->product->price }}" 
                                    data-init-price="{{ $item->product->price }} " data-is-point="false">
                                        {{ $item->product->price  * $item->quantity}}
                                    </var>
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
                    <var class="font-bold rupiah-currency" 
                    id="cart__shipping" data-price="{{ $siteSetting->shipping_price }}">
                    {{ $siteSetting->shipping_price }}
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Point total: </span>
                    <var class="not-italic font-bold" id="cart__total-point">
                        {{ $pointTotal }}
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Price Total: </span>
                    <var class="font-bold rupiah-currency" id="cart__total-money">
                        {{ $priceTotal + $siteSetting->shipping_price }}
                    </var>
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