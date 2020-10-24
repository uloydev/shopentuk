@extends('layouts.master')
@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')
@section('body-id', 'store')
@section('content')
<div class="container py-10 px-5 lg:px-0 mx-auto">
    <div class="flex flex-wrap justify-between">
        <aside class="w-full lg:w-3/12 lg:border-r-2 pr-5 lg:pr-10 order-last lg:order-first mt-10 lg:mt-0">
            <form action="" method="get" class="flex mb-5">
                <input type="text" placeholder="Cari produk..."
                class="appearance-none w-full leading-tight py-2 px-4 border-2 border-r-0 placeholder-gray-700 border-gray-400" required>
                <button type="submit" class="bg-gray-300 hover:bg-gray-900 py-2 px-4 border-2 border-gray-400 hover:text-white">
                    Cari
                </button>
            </form>
            <div class="py-4">
                <h1 class="text-3xl">Our best sellers</h1>
                <ul class="mt-3 divide-y divide-gray-400">
                    {{-- foreach --}}
                    <li class="pb-3">
                        <x-card-product product-img="{{ 'static/telkomsel.jpg' }}" product-name="{{ 'title' }}" 
                        product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                        product-rating="3" product-is-obral="false" is-horizontal="true" />
                    </li>
                    <li class="pb-3">
                        <x-card-product product-img="{{ 'static/telkomsel.jpg' }}" product-name="{{ 'title' }}" 
                        product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                        product-rating="2" product-is-obral="false" is-horizontal="true" />
                    </li>
                    <li class="pb-3">
                        <x-card-product product-img="{{ 'static/telkomsel.jpg' }}" product-name="{{ 'title' }}" 
                        product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                        product-rating="4" product-is-obral="false" is-horizontal="true" />
                    </li>
                    {{-- end of foreach --}}
                </ul>
            </div>
        </aside>
        <section class="w-full lg:w-9/12 lg:pl-12">
            @include('partial.breadcumb')
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <p class="mb-5 sm:mb-0">Menampilkan 1–12 dari 39 hasil</p>
                <form action="" method="GET">
                    <div class="relative">
                        <select
                        class="block appearance-none w-full bg-white border border-gray-400
                        hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none">
                            <option>Urutan default</option>
                            <option>Termurah</option>
                            <option>Termahal</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
            <div class="grid grid-cols-2 gap-x-5 gap-y-8 sm:grid-cols-3 mt-10">
                {{-- foreach --}}
                <x-card-product product-img="{{ 'example.jpg' }}" product-name="{{ 'title' }}" 
                product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                product-rating="0" product-is-obral="false" is-horizontal="false" />
                <x-card-product product-img="{{ 'example.jpg' }}" product-name="{{ 'title' }}"
                product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                product-rating="0" product-is-obral="false" is-horizontal="false"  />
                <x-card-product product-img="{{ 'example.jpg' }}" product-name="{{ 'title' }}"
                product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                product-rating="0" product-is-obral="false" is-horizontal="false"  />
                <x-card-product product-img="{{ 'example.jpg' }}" product-name="{{ 'title' }}"
                product-category="{{ 'category' }}" product-final-price="{{ 3000 }}"
                product-rating="0" product-is-obral="false" is-horizontal="false"  />
                {{-- end of foreach --}}
            </div>
        </section>
    </div>
</div>
@endsection