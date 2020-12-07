@extends('layouts.master')
@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')
@section('body-id', 'productDetail')
@section('content')
    <div class="container py-10 px-5 lg:px-0 mx-auto">
        <figure class="grid grid-cols-1 md:grid-cols-2 flex-col md:flex-row mb-8">
            <img src="{{ $product->mainImage ? asset('storage/' . $product->mainImage->url) : asset('img/static/example.jpg') }}"
            class="w-full mb-5 md:mb-0">
            <figcaption class="md:ml-10">
                @include('partial.breadcumb')
                <p class="text-2xl mb-5">{{ $product->title }}</p>
                @if($product->discount)
                <p class="mb-2"><del>Rp. <var>{{ number_format($product->price) }}</var></del></p>
                <p class="text-lg font-bold mb-5">
                    Rp. <var class="not-italic">{{ number_format($product->discount->discounted_price) }}</var>
                </p>
                @else
                    <p class="text-lg font-bold mb-5">
                        Rp. <var class="not-italic">{{ number_format($product->price) }}</var>
                    </p>
                @endif
                <div class="flex my-5">
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input min="1" max="999" value="1" name="quantity" type="number" required
                        class="appearance-none bg-white border border-gray-400 p-1 text-center w-12">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <x-btn-primary text="Tambah ke keranjang" class="ml-2" type="submit"/>
                    </form>
                </div>
                <hr>
                <p class="mt-5 text-gray-700">
                    Berat: 
                    <span>
                        {{ $product->weight }} gram
                    </span>
                </p>
                <p class="mt-5 text-gray-700">
                    Kategori: 
                    <span>
                        {{ $product->productCategory->title }}
                    </span>
                </p>
                @isset($product->productSubCategory)
                    <p class="mt-5 text-gray-700">
                        Sub Kategori: 
                        <span>
                            {{ $product->productSubCategory->title }}
                        </span>
                    </p>
                @endisset
            </figcaption>
        </figure>
        <section id="deskripsi-ulasan">
            <div id="deskripsi-detail" class="py-3">
                <a href="javascript:void(0);" 
                class="inline-block text-lg mb-5 p-3 border border-b-0 border-gray-400">
                    Deskripsi
                </a>
                <p>{{ $product->description }}</p>
            </div>
        </section>
        <section id="related-product" class="mt-5">
            <h1 class="mb-3 text-3xl">Produk Terkait</h1>
            @include('store.product.list', ['addClass' => "lg:grid-cols-4"])
        </section>
</div>
@endsection