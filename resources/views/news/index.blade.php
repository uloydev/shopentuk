@extends('layouts.master')
@section('title', 'Kumpulan berita')
@section('body-id', 'store')
@section('content')
    <header>
        <div class="pt-20 bg-fixed w-full relative" id="section-catalog__promo">
            {{-- <div class="bg-overlay bg-overlay--blue-gradient 
            absolute top-0 left-0 h-full w-full opacity-50"></div> --}}
            <div class="px-5 md:px-10 lg:px-24 text-center">
                <x-box-promo heading="Shopentuk Shop News" added-class="lg:text-center"
                subheading="Lihat Berita Terbaru seputar product, tips berbelanja dan promo terbaru dari shopentuk shop"
                subheadClass="text-base text-shadow-black-big"
                primary-btn-type="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 shadow order-1">
                </x-box-promo>
            </div>
        </div>
    </header>
    <div class="container py-10 px-5 lg:px-0">
        <div class="w-10/12 mx-auto">
            @foreach ($allNews as $news)
            <article class="rounded overflow-hidden shadow-lg mb-20 bg-white">
                <div class="px-6 py-4">
                    <div class="flex justify-between mb-5">
                        <p class="font-bold text-2xl">{{ $news->title }}</p>
                        <time class="text-gray-700">
                            {{ $news->created_at->format('d M Y H:i') }}
                        </time>
                    </div>
                    <div class="text-gray-700 text-base">
                        {!! $news->desc !!}
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $allNews->links('vendor.pagination.tailwind-white') }}
        </div>
    </div>
@endsection