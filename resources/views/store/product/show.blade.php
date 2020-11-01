@extends('layouts.master')

@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')

@section('body-id', 'store')

@section('content')
    <div class="container py-10 px-5 lg:px-0 mx-auto">
        <figure class="grid grid-cols-1 md:grid-cols-2 flex-col md:flex-row mb-8">
            <img src="{{ asset('storage/img/hoodie.jpg') }}" class="w-full mb-5 md:mb-0">
            <figcaption class="md:ml-10">
                @include('partial.breadcumb')
                <p class="text-2xl mb-5">{{ $product->title }}</p>
                <p class="text-lg font-bold mb-5">Rp. <var class="not-italic">{{ number_format($product->price) }}</var></p>
                <p>{{ $product->description }}</p>
                <div class="flex my-5">
                    <input type="number" class="appearance-none bg-white border border-gray-400 p-1 text-center w-12"
                    min="1" max="999" value="1" required>
                    <x-btn-primary text="Tambah ke keranjang" class="ml-2"/>
                </div>
                <hr>
                <p class="mt-5 text-gray-700">Kategori: <span>{{ $product->productCategory->title }}</span></p>
            </figcaption>
        </figure>
        <section id="deskripsi-ulasan">
            <ul data-tabs>
                <li>
                    <a href="#deskripsi-detail" data-tabby-default>Deskripsi</a>
                </li>
                <li>
                    <a href="#ulasan-detail">Ulasan</a>
                </li>
            </ul>
            <div id="deskripsi-detail" class="py-3">
                {!! $product->description !!}
            </div>
            <div id="ulasan-detail" class="py-3">
                ulasan detail
            </div>
        </section>
        <section id="related-product" class="mt-5">
            <h1 class="mb-3 text-3xl">Produk Terkait</h1>
            @include('store.product.list', ['addClass' => "lg:grid-cols-4"])
        </section>
</div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12/dist/js/tabby.polyfills.js"></script>
    <script>
        const tabs = new Tabby('[data-tabs]');
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12/dist/css/tabby-ui.css">
@endpush