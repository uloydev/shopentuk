@extends('layouts.master')

@section('title', ucfirst($title))

@section('body-id', $title)

@section('content')
<div class="container py-10 px-5 mx-auto">
    <div class="border-b border-gray-400 flex justify-between pb-5 font-bold">
        <h1>Order</h1>
        <p>Price</p>
    </div>
    <div class="grid grid-cols-1 divide-y divide-gray-300">
        @php
            $price = [30000, 24000, 40000, 50000];
            $shipping = 15000;
        @endphp
        @for ($i = 0; $i < 4; $i++)
            <div class="py-10 cart-item">
                <figure class="flex items-center">
                    <img src="{{ asset('img/static/3.jpg') }}" alt="Product on cart" class="h-24">
                    <figcaption class="px-3 flex-grow flex flex-col">
                        <div class="mb-5">
                            <p>Item {{ $i }}</p>
                            <p class="text-sm text-gray-700">Kategori</p>
                        </div>
                        <div>
                            <input type="number" name="qty" value="1" min="1" max="99" 
                            class="appearance-none text-center h-8 w-8 bg-white border border-gray-300" required>
                            <var class="rupiah-currency not-italic ml-2 md:ml-0">{{ $price[$i] }}</var>
                        </div>
                    </figcaption>
                </figure>
            </div>
        @endfor
        <ul>
            <li class="py-3 flex justify-between items-center">
                <span>Sub total: </span>
                <var class="font-bold not-italic rupiah-currency">
                    {{ array_sum($price) }}
                </var>
            </li>
            <li class="py-3 flex justify-between items-center">
                <span>Shipping: </span>
                <var class="font-bold not-italic rupiah-currency">
                    {{ $shipping }}
                </var>
            </li>
            <li class="py-3 flex justify-between items-center">
                <span>Total: </span>
                <var class="font-bold not-italic rupiah-currency cart-item__total">
                    {{ array_sum($price) + $shipping }}
                </var>
            </li>
        </ul>
    </div>
</div>
@endsection