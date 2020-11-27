@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        @for ($i = 0; $i < 5; $i++)
            <x-order-item product-name="T-shirt" product-qty="20"
            product-price="30000" product-bought-date="10 July 2020 15:30">
                <x-slot name="addonBtn">
                    <a href="" class="btn bg-teal-500 px-5 rounded-full top-0 right-0">
                        Pay this order
                    </a>
                </x-slot>
            </x-order-item>
        @endfor
    </div>
@endsection