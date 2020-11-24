@extends('layouts.master')
@section('title', 'Pakaian dan sepatu')
@section('body-id', 'landing')
@section('header')
<div class="container mx-auto h-full flex items-center justify-center lg:justify-start">
    <x-box-promo heading="Shopentuk Shop" subheading="Harga Terjangkau, kualitas terjamin" subheadClass="text-3xl"
        primary-btn-text="Shop now" primary-btn-link="#section-new-product"
        primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 rounded shadow md:mr-8 font-bold">
        <a href="{{ route('store.product.index') }}"
            class="bg-transparent hover:bg-black text-white font-semibold hover:text-white p-3 border border-white hover:border-transparent rounded mt-5 md:mt-0">
            Find more
        </a>
    </x-box-promo>
</div>
@endsection
@section('content')
<section class="section py-24" id="section-new-product">
    <div class="container lg:px-10">
        <h1 class="section__heading font-cursive text-4xl text-center font-bold">
            <span>Produk Terbaru Kami</span>
        </h1>
        @include('store.product.list', ['addClass' => "lg:grid-cols-5 mt-32"])
    </div>
</section>
<section class="section pt-16 pb-24" style="background-color: #f4f4f4;" id="section-catalog">
    <div class="container pt-5">
        <div class="w-full grid grid-cols-1 gap-10 md:grid-cols-2">
            @include('partial.catalog-card')
        </div>
        <div class="mt-5 py-24 bg-fixed" id="section-catalog__promo">
            <div id="section-catalog__overlay"></div>
            <div class="px-5 md:px-10 lg:px-24">
                <x-box-promo heading="Edisi Spesial"
                subheading="Beli Baju,Celana,Sepatu,Dan Akseksoris Di Shopentuk Akan Mendapatkan Point Yang Nantinya Akan Menjadi Potongan Untuk Pembelian Berikutnya"
                primary-btn-text="Beli sekarang" primary-btn-link="{{ route('store.product.index', ['sort'=>'promo']) }}" subheadClass="text-base"
                primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 shadow order-1">
                    <x-slot name="headingHelp">Promo Shopentuk Shop</x-slot>
                    <div class="w-full text-white mb-10">Apalagi Yang Kamu Tunggu Order Sekarang !!!</div>
                </x-box-promo>
            </div>
        </div>
    </div>
</section>
@endsection