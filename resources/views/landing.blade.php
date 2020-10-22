@extends('layouts.master')
@section('title', 'Pakaian dan sepatu')
@section('body-id', 'landing')
@section('header')
<div class="container mx-auto h-full flex items-center justify-center lg:justify-start">
    <x-box-promo heading="Shopentuk Shop" subheading="Harga Terjangkau, kualitas terjamin" subheadClass="text-3xl"
        primary-btn-text="Shop now" primary-btn-link="shop.com"
        primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 rounded shadow mr-8 font-bold">
        <a href=""
            class="bg-transparent hover:bg-black text-white font-semibold hover:text-white p-3 border border-white hover:border-transparent rounded">
            Find more
        </a>
    </x-box-promo>
</div>
@endsection
@section('content')
<section class="section py-24">
    <div class="container mx-auto px-10 lg:px-0">
        <h1 class="section__heading font-cursive text-4xl text-center font-bold">
            <span>Produk Terbaru Kami</span>
        </h1>
        <div
            class="grid grid-cols-1 gap-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 lg:gap-8 lg:gap-y-10 justify-items-center mt-32">
            @foreach ($products as $product)
            <x-card-product product-img="{{ 'example.jpg' }}" product-name="{{ $product->title }}"
                product-category="{{ $product->productCategory->title }}" product-final-price="{{ $product->price }}"
                product-rating="0" product-is-obral="{{ ($loop->index + 1) % 2 == 0 ? 'true' : 'false' }}" />
            @endforeach
        </div>
    </div>
</section>
<section class="section pt-16 pb-24" style="background-color: #f4f4f4;">
    <div class="container mx-auto px-10 md:px-0">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            {{-- foreach --}}
            <div class="relative">
                <img src="{{ asset("img/baju.jpg") }}" class="h-full object-cover">
                <div class="absolute bottom-0 p-6 z-10">
                    <x-box-promo heading="Baju" subheading="Berbagai Macam Jenis Baju Kami Jual"
                        subheadClass="text-base" primary-btn-text="Lihat Sekarang" primary-btn-link="shop.com"
                        primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects" />
                </div>
                <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
            </div>
            <div class="relative">
                <img src="{{ asset("img/baju.jpg") }}" class="h-full object-cover">
                <div class="absolute bottom-0 p-6 z-10">
                    <x-box-promo heading="Baju" subheading="Berbagai Macam Jenis Baju Kami Jual"
                        subheadClass="text-base" primary-btn-text="Lihat Sekarang" primary-btn-link="shop.com"
                        primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects" />
                </div>
                <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
            </div>
            <div class="relative">
                <img src="{{ asset("img/baju.jpg") }}" class="h-full object-cover">
                <div class="absolute bottom-0 p-6 z-10">
                    <x-box-promo heading="Baju" subheading="Berbagai Macam Jenis Baju Kami Jual"
                        subheadClass="text-base" primary-btn-text="Lihat Sekarang" primary-btn-link="shop.com"
                        primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects" />
                </div>
                <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
            </div>
            {{-- end of foreach --}}
        </div>
        <div class="mt-5 relative p-40 bg-fixed" id="section__promo">
            <x-box-promo heading="Edisi Spesial"
                subheading="Beli Baju,Celana,Sepatu,Dan Akseksoris Di Shopentuk Akan Mendapatkan Point Yang Nantinya Akan Menjadi Potongan Untuk Pembelian Berikutnya"
                primary-btn-text="Beli sekarang" primary-btn-link="shop.com" subheadClass="text-base"
                primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 shadow order-1">
                <x-slot name="headingHelp">Promo Shopentuk Shop</x-slot>
                <div class="w-full text-white mb-10">Apalagai Yang Kamu Tunggu Order Sekarang !!!</div>
            </x-box-promo>
        </div>
    </div>
</section>
<footer class="bg-white p-10">
    <div class="container flex justify-between mx-auto text-xl px-20">
        <small>
            Copyright &copy; <time>{{ date('Y') }}</time> 
            <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }} Shop</a>
        </small>
        <address class="not-italic">Indonesia - Jakarta</address>
    </div>
</footer>
@endsection