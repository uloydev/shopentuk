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
                        <img src="https://picsum.photos/800" alt="Product on cart" class="h-24 mx-auto">
                        <figcaption class="p-3 flex-grow flex flex-col lg:flex-row lg:justify-between">
                            <div class="mb-5 lg:mb-0">
                                <p class="mb-2">Item {{ $item->product->title }}</p>
                                <p class="text-sm text-gray-700">{{$item->product->category->title ?? ''}}</p>
                            </div>
                            <div>
                                <input type="number" name="qty" value="{{ $item->quantity }}" min="1" max="99" 
                                class="cart-item__qty appearance-none text-center h-8 w-8 lg:w-12 bg-white border border-gray-300" data-item-id="{{ $item->id }}" required>
                                @if ($item->is_toko_point)
                                    <var class="cart-item__price not-italic ml-3"
                                    data-price="{{ $item->product->point_price }}" data-init-price="{{ $item->product->point_price }}">
                                        {{ $item->product->point_price }}
                                    </var>    
                                @else
                                    <var class="rupiah-currency cart-item__price not-italic ml-3"
                                    data-price="{{ $item->product->price }}" data-init-price="{{ $item->product->price }}">
                                        {{ $item->product->price }}
                                    </var>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            <ul class="mb-3">
                <li class="py-3 flex justify-between items-center">
                    <span>Sub total: </span>
                    <var class="not-italic font-bold rupiah-currency" id="cart__sub-total">{{ $priceTotal }}</var>
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
                    <var class="not-italic font-bold" id="cart__sub-total">{{ $pointTotal }}</var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Price Total: </span>
                    <var class="font-bold rupiah-currency" id="cart__total">{{ $priceTotal + $siteSetting->shipping_price }}</var>
                </li>
            </ul>
        </div>
        <div class="flex justify-center items-center flex-col lg:flex-row">
            <div class="lg:mr-auto flex items-center text-xs justify-between w-full mb-3 lg:mb-0">
                <a href="{{ url()->previous() }}" id="test"
                class="btn-outline bg-transparent hover:bg-yellow-500 border-yellow-500 text-yellow-400 hover:text-gray-800">
                    <box-icon name='left-arrow-alt' color="#fad13c"></box-icon>
                    Kembali
                </a>
                <x-btn-primary type="button" text="Perbarui keranjang"
                class="border-gray-500 hover:border-gray-900 flex items-center lg:mr-3">
                    <box-icon name='refresh' class="mr-1" animation="tada-hover"></box-icon>
                </x-btn-primary>
            </div>
            <x-btn-primary text="Lanjutkan checkout" 
            class="btn bg-teal-500 focus:bg-teal-800 hover:bg-teal-700 border-teal-700 w-full justify-center"/>
            
        </div>
    @else
        <figure class="my-5">
            <img src="{{ asset('img/static/empty-cart.webp') }}" alt="Empty cart" class="block h-64 mx-auto">
            <figcaption class="text-center">
                <h1 class="text-3xl mb-5">Keranjang Belanja Kamu Masih Kosong nih...</h1>
                <p class="text-lg">
                    Ayo 
                    <a href="{{ route('store.product.index') }}" class="text-blue-600 underline">
                        beli product
                    </a> 
                    sekarang!
                </p>
            </figcaption>
        </figure>
    @endif
</div>
@endsection