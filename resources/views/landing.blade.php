@extends('layouts.master')
@section('title', 'Pakaian dan sepatu')
@section('header')
<div class="container mx-auto h-full flex items-center justify-center lg:justify-start">
    <x-box-promo heading="Shopentuk Shop" subheading="Harga Terjangkau, kualitas terjamin" primary-btn-text="Shop now"
        primary-btn-link="shop.com"
        primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 rounded shadow mr-8">
        <a href=""
            class="bg-transparent hover:bg-black text-white font-semibold hover:text-white p-3 border border-white hover:border-transparent rounded">
            Find more
        </a>
    </x-box-promo>
</div>
@endsection
@section('content')
    <section class="section py-24">
        <h1 class="section__heading font-cursive text-4xl text-center font-bold">
            <span>Produk Terbaru Kami</span>
        </h1>
        <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 lg:gap-8 lg:gap-y-10 justify-items-center mt-32">
            <x-card-product product-img="{{ asset('img/example.jpg') }}" product-name="DNK Blue Shoes" product-category="Pria"
            product-original-price="150" product-final-price="120" product-rating="0" product-is-obral="true" />
            <x-card-product product-img="{{ asset('img/example.jpg') }}" product-name="DNK Blue Shoes" product-category="Pria"
            product-final-price="120" product-rating="0" product-is-obral="false" />
            <x-card-product product-img="{{ asset('img/example.jpg') }}" product-name="DNK Blue Shoes" product-category="Pria"
            product-original-price="150" product-final-price="120" product-rating="3" product-is-obral="true" />
            <x-card-product product-img="{{ asset('img/example.jpg') }}" product-name="DNK Blue Shoes" product-category="Pria"
            product-final-price="120" product-rating="0" product-is-obral="false" />
            <x-card-product product-img="{{ asset('img/example.jpg') }}" product-name="DNK Blue Shoes" product-category="Pria"
            product-original-price="150" product-final-price="120" product-rating="0" product-is-obral="true" />
            <x-card-product product-img="{{ asset('img/example.jpg') }}" product-name="DNK Blue Shoes" product-category="Pria"
            product-final-price="120" product-rating="0" product-is-obral="false" />
        </div>
    </section>
@endsection