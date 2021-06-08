@extends('layouts.master')
@section('title', 'Pakaian dan sepatu')
@section('body-id', 'landing')


@section('header-class', 'flex flex-col bg-fixed bg-cover h-screen')
@section('header-bg', asset('img/header-landing.jpg'))

@section('header')
<div class="container mx-auto h-full flex items-center justify-center lg:justify-start">
    <div class="bg-overlay bg-overlay--blue"></div>
    <x-box-promo heading="Shopentuk Shop" subheadClass="text-3xl"
    subheading="Harga Terjangkau, kualitas terjamin"
        primary-btn-text="Shop now" primary-btn-link="#section-new-product"
        primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border 
        border-gray-400 rounded shadow md:mr-8 font-bold">
        <a href="{{ route('store.product.index') }}"
            class="bg-transparent hover:bg-black text-white font-semibold 
            hover:text-white p-3 border border-white hover:border-transparent 
            rounded mt-5 md:mt-0">
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
        @include('store.product.list', [
            'addClass' => "lg:grid-cols-5 mt-32",
            'classImg' => 'w-full'
        ])
    </div>
</section>
<section class="section pt-16 pb-24" style="background-color: #f4f4f4;" id="section-catalog">
    <div class="container pt-5">
        <div class="w-full grid grid-cols-1 gap-10 md:grid-cols-2">
            @foreach ($catalogs as $catalog)
            <div class="relative">
                <img src="https://picsum.photos/500" class="h-full w-full object-cover">
                <div class="absolute bottom-0 p-10 z-10 w-full max-h-full">
                        <x-box-promo 
                        heading="{{ $catalog->heading }}" 
                        subheading="{{ $catalog->subheading }}"
                        subheadClass="text-base" primary-btn-text="Lihat Sekarang"
                        primary-btn-link="{{ $catalog->route }}"
                        primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects"/>
                </div>
                <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
            </div>    
            @endforeach
        </div>
        <div class="mt-5 py-24 bg-fixed w-full relative" id="section-catalog__promo" 
        style="background-image: url('{{ asset("img/special-edition.jpg") }}')">
            <div class="bg-overlay bg-overlay--blue-gradient 
            absolute top-0 left-0 h-full w-full opacity-50"></div>
            <div class="px-5 md:px-10 lg:px-24">
                <x-box-promo heading="Shopentuk Shop News"
                subheading="Lihat Berita Terbaru seputar product, tips berbelanja dan promo terbaru dari shopentuk shop"
                primary-btn-text="Lihat Sekarang" primary-btn-link="{{ route('news.index') }}" subheadClass="text-base"
                primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 shadow order-1">
                </x-box-promo>
            </div>
        </div>
    </div>
</section>
@endsection