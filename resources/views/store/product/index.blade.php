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
                <x-btn-primary text="Cari" class="border-gray-400"/>
            </form>
            <div class="py-4">
                <h1 class="text-2xl">Our best sellers</h1>
                <ul class="mt-5 divide-y divide-gray-400">
                    @foreach ($bestProducts as $product)
                        <li class="pb-3">
                            @if ($product->discount)
                                <x-card-product
                                product-img="{{ $product->mainImage ? $product->mainImage->url : 'example.jpg' }}"
                                product-name="{{ Str::words($product->title, 2) }}"
                                product-category="{{ $product->productCategory->title }}" 
                                product-original-price="{{ $product->price }}"
                                product-final-price="{{ $product->discount->discounted_price }}"
                                product-rating="0" 
                                product-is-obral="false"
                                is-horizontal="true" />
                            @else
                                <x-card-product 
                                product-img="{{ $product->mainImage ? $product->mainImage->url : 'example.jpg' }}" 
                                product-name="{{ Str::words($product->title, 2) }}"
                                product-category="{{ $product->productCategory->title }}" 
                                product-final-price="{{ $product->price }}"
                                product-rating="0" 
                                product-is-obral="false"
                                is-horizontal="true" />
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="py-4">
                <h1 class="text-2xl">Browse by product categories</h1>
                <ul class="mt-5">
                    @foreach ($categories->where('is_digital_product', false) as $category)
                    <li class="flex justify-between flex-col py-3">
                        <a href="{{ route('store.product', array_merge(array_diff_key($httpQuery, ['subCatId' => '']),['catId'=> $category->id])) }}" title="{{ $category->title }}" class="justify-between flex">
                            {{ Str::words($category->title, 3) }}
                            <var class="not-italic">{{ '(' . $category->products->count() . ')' }}</var>
                        </a>
                        <ul class="pl-5">
                            @foreach ($category->productSubCategory as $subCategory)
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <a href="{{ route('store.product', array_merge(array_diff_key($httpQuery,
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
                @foreach ($products as $product)
                    @if ($product->discount)
                        <x-card-product
                            product-img="{{ $product->mainImage ? $product->mainImage->url : 'example.jpg' }}" 
                            product-name="{{ $product->title }}"
                            product-category="{{ $product->productCategory->title }}" 
                            product-original-price="{{ number_format($product->price) }}"
                            product-final-price="{{ number_format($product->discount->discounted_price) }}"
                            product-rating="0" 
                            product-is-obral="true"
                            is-horizontal="false" />
                    @else
                        <x-card-product 
                            product-img="{{ $product->mainImage ? $product->mainImage->url : 'example.jpg' }}" 
                            product-name="{{ $product->title }}"
                            product-category="{{ $product->productCategory->title }}" 
                            product-final-price="{{ number_format($product->price) }}"
                            product-rating="0" 
                            product-is-obral="false"
                            is-horizontal="false" />
                    @endif
                @endforeach
                {{-- end of foreach --}}
            </div>
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </section>
    </div>
</div>

{{-- rapihin briq jsnya --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" 
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    let httpQuery = {!! json_encode($httpQuery) !!};
    let currentPage = {{ $products->currentPage() }};
    let currentUrl = "{{ URL::current() }}";
    let newUrl;

    $("#form-search").submit(function (e) {
        e.preventDefault();
        var searchInput = $("#search-input").val();
        newUrl = currentUrl + "?search=" + searchInput;
        for (const [key, value] of Object.entries(httpQuery)) {
            if (key != 'search') {
                newUrl += "&" + key + "=" + (value ?? '');
            }
        }
        window.location.href = newUrl;
    });

    $("#sort-product").change(function () {
        newUrl = currentUrl + "?sort=" + $(this).val();
        for (const [key, value] of Object.entries(httpQuery)) {
            if (key != 'sort') {
                newUrl += "&" + key + "=" + (value ?? '');
            }
        }
        window.location.href = newUrl;
    });
</script>
@endsection

