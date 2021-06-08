@extends('layouts.master')
@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')
@section('body-id', 'store')
@section('content')

<div class="container py-10 px-5 lg:px-0 mx-auto">
    <div class="flex flex-wrap justify-between">
        @include('partial.sidebar-search')
        <section class="w-full lg:w-9/12 lg:pl-12" id="section-product">
            @include('partial.breadcumb')
            @include('partial.filter-search')
            <div class="grid grid-cols-2 gap-x-5 gap-y-8 sm:grid-cols-3 
            lg:grid-cols-4 lg:gap-x-10 mt-10">
                @forelse ($products as $product)
                    @if ($product->discount)
                        <x-card-product
                            data-product-id="{{ $product->id }}"
                            product-img="{{ $product->mainImage ? Storage::url($product->mainImage->url) : 'https://via.placeholder.com/200' }}" 
                            product-name="{{ $product->title }}"
                            product-category="{{ $product->productCategory->title }}" 
                            product-category-id="{{ $product->productCategory->id }}" 
                            product-original-price="{{ $product->price }}"
                            product-final-price="{{ $product->discount->discounted_price }}"
                            product-rating="0" 
                            product-is-obral="true"
                            is-horizontal="false"
                            height-img="200px"
                            class-img="object-cover"
                        />
                    @else
                        <x-card-product
                            data-product-id="{{ $product->id }}"
                            product-img="{{ $product->mainImage ? Storage::url($product->mainImage->url) : 'https://via.placeholder.com/200' }}" 
                            product-name="{{ $product->title }}"
                            product-category="{{ $product->productCategory->title }}" 
                            product-category-id="{{ $product->productCategory->id }}" 
                            product-final-price="{{ $product->price }}"
                            product-rating="0" 
                            product-is-obral="false"
                            is-horizontal="false"
                            height-img="200px"
                            class-img="object-cover"
                        />
                    @endif
                @empty
                    @include('partial.empty-store')
                @endforelse
            </div>
            @include('partial.store-pagination')
        </section>
    </div>
</div>

@endsection

