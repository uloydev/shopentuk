@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        @for ($i = 0; $i < 5; $i++)
            <x-order-item product-name="Star wars" product-qty="20"
            product-price="30000" product-bought-date="10 July 2020 15:30"/>
        @endfor
    </div>
@endsection