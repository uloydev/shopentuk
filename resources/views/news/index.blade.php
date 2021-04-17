@extends('layouts.master')
@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')
@section('body-id', 'store')
@section('content')
    <header>
        <div class="py-24 bg-fixed w-full relative" id="section-catalog__promo" 
        style="background-image: url('{{ asset("img/special-edition.jpg") }}')">
            <div class="bg-overlay bg-overlay--blue-gradient 
            absolute top-0 left-0 h-full w-full opacity-50"></div>
            <div class="px-5 md:px-10 lg:px-24">
                <x-box-promo heading="Edisi Spesial"
                subheading="Beli Baju,Celana,Sepatu,Dan Akseksoris Di Shopentuk Akan Mendapatkan Point Yang Nantinya Akan Menjadi Potongan Untuk Pembelian Berikutnya"
                subheadClass="text-base"
                primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 shadow order-1">
                    <x-slot name="headingHelp">Promo Shopentuk Shop</x-slot>
                </x-box-promo>
            </div>
        </div>
    </header>
    <div class="container py-10 px-5 lg:px-0 mx-auto">
        @foreach ($allNews as $news)
        <article class="mb-5">
            <h1 class="text-3xl text-center">{{ $news->title }}</h1>
            <div>
                {!! $news->desc !!}
            </div>
        </article>
        @endforeach
        <div class="mt-5">
            {{ $allNews->links() }}
        </div>
    </div>
@endsection