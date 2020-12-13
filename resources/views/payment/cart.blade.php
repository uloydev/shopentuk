@extends('layouts.master')

@section('title', ucfirst($title))

@section('body-id', $title)

@section('content')
<div class="container h-full pt-10 pb-20 px-5 mx-auto">
    @if(session('error'))
    <x-alert type="error">
        {{ session('error') }}
    </x-alert>
    @endif
    @if (isset($cart) && $cart->cartItems->count() > 0)
        <input type="hidden" id="cartId" value="{{ $cart->id }}">
        <div class="border-b border-gray-400 flex justify-between pb-5 font-bold">
            <h1>Order</h1>
            <p>Price</p>
        </div>
        <div class="grid grid-cols-1">
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
                                    data-is-point="true" data-weight="{{ $item->product->weight }}">
                                        {{ $item->product->point_price * $item->quantity }} point
                                    </var>
                                @else
                                    @if (!empty($item->product->discount))
                                        <var class="rupiah-currency cart-item__price not-italic ml-3"
                                        data-price="{{ $item->product->discount->discounted_price }}" data-is-point="false"
                                        data-init-price="{{ $item->product->discount->discounted_price }}" data-weight="{{ $item->product->weight }}">
                                        {{ $item->product->discount->discounted_price  * $item->quantity }}
                                        </var>
                                    @else
                                        <var class="rupiah-currency cart-item__price not-italic ml-3"
                                        data-price="{{ $item->product->price }}" data-is-point="false"
                                        data-init-price="{{ $item->product->price}}" data-weight="{{ $item->product->weight }}">
                                            {{ $item->product->price  * $item->quantity}}
                                        </var>
                                    @endif
                                @endif
                                <input type="number" name="qty" value="{{ $item->quantity }}" 
                                min="0" max="99" data-item-id="{{ $item->id }}" 
                                class="cart-item__qty appearance-none text-center h-8 w-8 lg:w-12
                                bg-white border border-gray-300" required>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach

            {{-- please fix this voucher input ui --}}
            @if($cart->cartItems->where('is_toko_point', false)->count() > 0)
                <div class="flex items-center justify-end space-x-0">
                    <x-input-basic name="voucher_code" add-class="transform scale-90" 
                    placeholder="Ketik kode voucher"/>
                    <x-btn-primary text="Cek Kode" id="btnCheckVoucher"
                    class="transform scale-90 btn bg-teal-500 active:bg-teal-800 hover:bg-teal-600 border-teal-700 mb-5"/>
                </div>
            @else
                <p>Anda tidak bisa menggunakan voucher karena semua belanjaan anda menggunakan point</p>
            @endif
            
            <ul class="mb-3">
                <li class="py-3 flex justify-between items-center">
                    <span>Berat total : </span>
                    <var class="not-italic font-bold" id="cart__weight-total">
                        {{ $weightTotal }} gram
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>voucher diskon : </span>
                    <var class="not-italic font-bold" id="cart__voucher-discount">
                        Rp. 0
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Shipping: </span>
                    @if ($cart->cartItems->where('is_toko_point', false)->count() == 0)
                        <var class="font-bold" id="cart__shipping"
                        data-price="{{ $siteSetting->shipping_price / $siteSetting->point_value}}" data-is-point="true">
                        {{ $siteSetting->shipping_price / $siteSetting->point_value * ceil($weightTotal / 1000) }} point
                        </var>
                    @else
                        <var class="font-bold rupiah-currency" id="cart__shipping"
                        data-price="{{ $siteSetting->shipping_price }}" data-is-point="false">
                        {{ $siteSetting->shipping_price * ceil($weightTotal / 1000)}}
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
                    <span>Kembali</span>
                </a>
            </div>
            <x-btn-primary text="Lanjutkan checkout" id="btnShowCheckoutStep"
            class="btn bg-teal-500 active:bg-teal-800 hover:bg-teal-600 border-teal-700
            w-full justify-center"/>
        </div>

        @include('payment.step-checkout')
        @include('partial.modal-add-address',[
            'idModal' => 'modalAddAddress',
            'formId' => 'newAddressForm',
            'formUrl' => route('my-account.address.store')
        ])

    @else
        @include('payment.no-item')
    @endif

    
</div>
@endsection