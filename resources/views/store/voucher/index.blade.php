@extends('layouts.master')
@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')
@section('body-id', 'store')
@section('content')
<div class="container py-10 px-5 lg:px-0 mx-auto">
    <div class="flex flex-wrap justify-between">
        <aside class="w-full lg:w-3/12 lg:border-r-2 pr-5 lg:pr-10 order-last lg:order-first mt-10 lg:mt-0">
            <form action="" method="get" class="flex mb-5" id="form-search">
                <input type="text" placeholder="Cari produk..."
                class="appearance-none w-full leading-tight py-2 px-4 border-2 border-r-0 placeholder-gray-700 border-gray-400" name="search" 
                value="{{ $httpQuery['search'] ?? ''}}" id="search-input">
                <x-btn type="primary" text="Cari" action="submit"/>
            </form>
            <div class="py-4">
                <h1 class="text-2xl">Our best sellers</h1>
                <ul class="mt-5 divide-y divide-gray-400">
                    @foreach ($bestProducts as $product)
                        <li class="pb-3">
                            @if ($product->discount)
                                <x-card-product
                                product-img="{{ $product->mainImage ? asset('storage/' . $product->mainImage->url) : asset('img/static/example.jpg') }}"
                                product-name="{{ Str::words($product->title, 2) }}"
                                product-category="{{ $product->productCategory->title }}" 
                                product-category-id="{{ $product->productCategory->id }}" 
                                product-original-price="{{ $product->price }}"
                                product-final-price="{{ $product->discount->discounted_price }}"
                                product-rating="0" 
                                product-is-obral="false"
                                is-horizontal="true"
                                is-digital-product="true" />
                            @else
                                <x-card-product 
                                product-img="{{ $product->mainImage ? asset('storage/' . $product->mainImage->url) : asset('img/static/example.jpg') }}"
                                product-name="{{ Str::words($product->title, 2) }}"
                                product-category="{{ $product->productCategory->title }}" 
                                product-category-id="{{ $product->productCategory->id }}" 
                                product-final-price="{{ $product->price }}"
                                product-rating="0" 
                                product-is-obral="false"
                                is-horizontal="true"
                                is-digital-product="true" />
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="py-4">
                <h1 class="text-2xl">Browse by product categories</h1>
                <li class="flex justify-between flex-col py-3">
                    <a class="{{ !isset($httpQuery['catId']) && !isset($httpQuery['subCatId']) ? 'font-bold' : ''}}"
                    href="{{ route('store.voucher.index', array_merge(array_diff_key($httpQuery, ['subCatId'=>'', 'catId'=>'']))) }}" class="justify-between flex">
                        All Category
                    </a>
                </li>
                <ul class="mt-5">
                    @foreach ($categories->where('is_digital_product', true) as $category)
                    <li class="flex justify-between flex-col py-3">
                        <a class="{{ isset($httpQuery['catId']) && $httpQuery['catId'] == $category->id ? 'font-bold' : ''}}"
                        href="{{ route('store.voucher.index', array_merge(array_diff_key($httpQuery, ['subCatId' => '']),['catId'=> $category->id])) }}" title="{{ $category->title }}" class="justify-between flex">
                            {{ Str::words($category->title, 3) }}
                            <var class="not-italic">{{ '(' . $category->products->count() . ')' }}</var>
                        </a>
                        <ul class="pl-5">
                            @foreach ($category->productSubCategory as $subCategory)
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <a class="{{ isset($httpQuery['subCatId']) && $httpQuery['subCatId'] == $subCategory->id ? 'font-bold' : ''}}"
                                        href="{{ route('store.voucher.index', array_merge(array_diff_key($httpQuery,
                                        ['catId' => '']), ['subCatId'=> $subCategory->id])) }}"
                                        title="{{ $subCategory->title }}">
                                            {{ Str::limit($subCategory->title, 15) }}
                                        </a>
                                        <var class="not-italic">{{ $subCategory->products->count() }}</var>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <section class="w-full lg:w-9/12 lg:pl-12">
            @include('partial.breadcumb')
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                {{-- <p class="mb-5 sm:mb-0">Menampilkan 1–12 dari 39 hasil</p> --}}
                <form action="" method="GET">
                    <div class="relative">
                        <select id="sort-product"
                        class="block appearance-none w-full bg-white border border-gray-400
                        hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none" name="sort">
                            <option value="default">Urutan default</option>
                            <option value="cheap" 
                            {{ ($httpQuery['sort'] ?? '') == 'cheap' ? 'selected' : '' }}>Termurah</option>
                            <option value="expensive" 
                            {{ ($httpQuery['sort'] ?? '') == 'expensive' ? 'selected' : '' }}>Termahal</option>
                            <option value="promo" 
                            {{ ($httpQuery['sort'] ?? '') == 'promo' ? 'selected' : '' }}>Promo</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
            <div class="grid grid-cols-2 gap-x-5 gap-y-8 sm:grid-cols-3 lg:grid-cols-4 lg:gap-x-10 mt-10">
                {{-- foreach --}}
                @forelse ($products as $product)
                    @if ($product->discount)
                        <x-card-product
                            product-img="{{ $product->mainImage ? asset('storage/' . $product->mainImage->url) : asset('storage/img/telkomsel.jpg') }}" 
                            product-name="{{ $product->title }}"
                            product-category="{{ $product->productCategory->title }}" 
                            product-category-id="{{ $product->productCategory->id }}" 
                            product-original-price="{{ $product->price }}"
                            product-final-price="{{ $product->discount->discounted_price }}"
                            product-rating="0" 
                            product-is-obral="true"
                            is-horizontal="false"
                            is-digital-product="true" />
                    @else
                        <x-card-product 
                            product-img="{{ $product->mainImage ? asset('storage/' . $product->mainImage->url) : asset('storage/img/telkomsel.jpg') }}" 
                            product-name="{{ $product->title }}"
                            product-category="{{ $product->productCategory->title }}" 
                            product-category-id="{{ $product->productCategory->id }}" 
                            product-final-price="{{ $product->price }}"
                            product-rating="0" 
                            product-is-obral="false"
                            is-horizontal="false"
                            is-digital-product="true" />
                    @endif
                @empty
                    @include('store.product.empty', [
                        'message' => "Oops, there's no voucher called " . 
                                     "<q>" . $httpQuery['search'] . "</q>" . " on this categories"
                    ])
                @endforelse
            </div>
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </section>
    </div>
</div>

{{-- rapihin briq jsnya --}}
@endsection

