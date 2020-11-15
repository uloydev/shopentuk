@extends('layouts.master')
@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')
@section('body-id', 'store')
@section('content')
<div class="container py-10 px-5 lg:px-0 mx-auto">
    <figure class="grid grid-cols-1 md:grid-cols-2 flex-col md:flex-row mb-8">
        <img src="{{ asset('img/'.($product->mainImage ? $product->mainImage->url : 'static/telkomsel.jpg')) }}" class="w-full mb-5 md:mb-0">
        <figcaption class="md:ml-10">
            @include('partial.breadcumb')
            <p class="text-2xl mb-5">{{ $product->title }}</p>
            <p class="text-lg font-bold mb-5">
                <var class="not-italic">{{ $product->point_price }} point</var>
            </p>
            <div class="flex my-5">
                <form action="{{ route('store.cart.addItem') }}" method="post">
                    @csrf
                    <input type="number" class="appearance-none bg-white border border-gray-400 p-1 text-center w-12"
                    min="1" max="999" value="1" required name="quantity">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="is_toko_point" value="true">
                    <x-btn-primary text="Tambah ke keranjang" class="ml-2" type="submit"/>
                </form>
            </div>
            <hr>
            <p class="mt-5 text-gray-700">Kategori: <span>{{ $product->productCategory->title }}</span></p>
            @isset($product->productSubCategory)
                <p class="mt-5 text-gray-700">Sub Kategori: <span>{{ $product->productSubCategory->title }}</span></p>
            @endisset
        </figcaption>
    </figure>
    <section id="deskripsi-ulasan">
        <ul data-tabs>
            <li>
                <a href="#deskripsi-detail">Deskripsi</a>
            </li>
            <li>
                <a href="#ulasan-detail" data-tabby-default>Ulasan</a>
            </li>
        </ul>
        <div id="deskripsi-detail" class="py-3">
            {!! $product->description !!}
        </div>
        <div id="ulasan-detail" class="py-5">
            {{-- contoh --}}
            @php
                $ulasanTotal = 3;
            @endphp
            @if ($ulasanTotal > 0)
                @for ($i = 0; $i < $ulasanTotal; $i++)
                    <div class="flex flex-col mb-8">
                        <figure class="flex border-b-2 border-gray-300 pb-5 items-center">
                            <img src="{{ asset('img/static/people.png') }}" class="mr-2 h-8 w-8 rounded-full"
                            alt="People avatar {{ env('APP_NAME') }}">
                            <figcaption>
                                <p>People name</p>
                            </figcaption>
                        </figure>
                        <div class="py-3">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus labore 
                                incidunt totam maxime eligendi reprehenderit alias libero nam. 
                                Possimus architecto corrupti exercitationem cum ipsum cumque, 
                                non quis impedit error reiciendis?
                            </p>
                        </div>
                    </div>
                @endfor
            @else
            <h1 class="text-xl mb-5 mt-2 px-1">Belum ada ulasan</h1>
            @endif
            {{-- end of contoh --}}
            <form action="/dummy-post" method="POST" class="border border-gray-400 p-6 mt-3">
                @csrf
                <h2 class="text-xl mb-2 font-medium">
                    <span>
                        {{ $ulasanTotal == 0 ? 'Jadilah yang pertama memberikan ulasan ' : 'Berikan ulasanmu ' }}
                    </span>
                    <span>untuk <q>{{ $product->title }}</q></span>
                </h2>
                <h3 class="text-base mb-5">
                    Alamat email Anda tidak akan dipublikasikan. 
                    Ruas yang wajib ditandai *
                </h3>
                <label for="ulasan" class="block mb-2">
                    <span>Ulasan anda</span>
                </label>
                <textarea name="ulasan" id="ulasan" rows="5" placeholder="Minimal 5 kata" 
                class="form-textarea block w-full bg-white" required></textarea>
                <div class="grid grid-cols-2 gap-5 mt-5">
                    <x-input-basic name="nama_lengkap" label="Nama lengkap" add-class="only-alpha-space"
                    placeholder="Mohon gunakan nama lengkap" value="{{ Auth::user()->name ?? '' }}"
                    title="Nama tidak boleh mengandung spesial karakter, angka, dan spasi diawal maupun diakhir"
                    required/>
                    <div class="mb-5">
                        <x-input-basic name="email" value="{{ Auth::user()->email ?? '' }}" 
                        placeholder="Mohon gunakan email valid" type="email" label="Email" required/>
                        <div class="flex items-start text-sm">
                            <input type="checkbox" name="simpan_data" class="form-checkbox border-gray-500">
                            <span class="ml-2 leading-relaxed -mt-2">
                                Simpan nama dan email untuk komentar saya berikutnya
                            </span>
                        </div>
                    </div>
                </div>
                <x-btn-primary text="Kirim" class="col-auto"/>
            </form>
        </div>
    </section>
    <section id="related-product" class="mt-5">
        <h1 class="mb-3 text-3xl">Produk Terkait</h1>
        @include('store.toko-point.list', ['addClass' => "lg:grid-cols-4"])
    </section>
</div>
@endsection

