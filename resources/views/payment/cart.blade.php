@extends('layouts.master')

@section('title', ucfirst($title))

@section('body-id', $title)

@section('content')
<div class="container pt-10 pb-20 px-5 mx-auto">
    <div class="border-b border-gray-400 flex justify-between pb-5 font-bold">
        <h1>Order</h1>
        <p>Price</p>
    </div>
    <div class="grid grid-cols-1 divide-y divide-gray-300">
        @php //contoh
            $price = [30000, 24000, 40000, 50000];
            $shipping = 15000;
        @endphp
        @for ($i = 0; $i < 4; $i++)
            <div class="py-10 cart-item">
                <figure class="flex flex-wrap items-center">
                    <img src="{{ asset('img/static/3.jpg') }}" alt="Product on cart" class="h-24 mx-auto">
                    <figcaption class="p-3 flex-grow flex flex-col lg:flex-row lg:justify-between">
                        <div class="mb-5 lg:mb-0">
                            <p class="mb-2">Item {{ $i }}</p>
                            <p class="text-sm text-gray-700">Kategori</p>
                        </div>
                        <div>
                            <input type="number" name="qty" value="1" min="1" max="99" 
                            class="cart-item__qty appearance-none text-center h-8 w-8 lg:w-12 bg-white border border-gray-300" required>
                            <var class="rupiah-currency cart-item__price not-italic ml-3"
                            data-price="{{ $price[$i] }}" data-init-price="{{ $price[$i] }}">
                                {{ $price[$i] }}
                            </var>
                        </div>
                    </figcaption>
                </figure>
            </div>
        @endfor
        <ul class="mb-3">
            <li class="py-3 flex justify-between items-center">
                <span>Sub total: </span>
                <var class="not-italic font-bold" id="cart__sub-total"></var>
            </li>
            <li class="py-3 flex justify-between items-center">
                <span>Shipping: </span>
                <var class="font-bold not-italic rupiah-currency" 
                id="cart__shipping" data-price="{{ $shipping }}">
                    {{ $shipping }}
                </var>
            </li>
            <li class="py-3 flex justify-between items-center">
                <span>Total: </span>
                <var class="font-bold not-italic rupiah-currency" id="cart__total"></var>
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
</div>
@endsection