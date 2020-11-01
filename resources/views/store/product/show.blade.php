@extends('layouts.master')

@section('title', 'Produk - ' . env('APP_NAME') . ' Shop')

@section('body-id', 'productDetail')

@section('content')
    <div class="container py-10 px-5 lg:px-0 mx-auto">
        <figure class="grid grid-cols-1 md:grid-cols-2 flex-col md:flex-row mb-8">
            <img src="{{ asset('storage/img/hoodie.jpg') }}" class="w-full mb-5 md:mb-0">
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
                    <a href="#deskripsi-detail">Deskripsi</a>
                </li>
                <li>
                    <a href="#ulasan-detail" data-tabby-default>Ulasan</a>
                </li>
            </ul>
            <div id="deskripsi-detail" class="py-3">
                {!! $product->description !!}
            </div>
            <div id="ulasan-detail" class="py-3">
                @php
                    $reviews = [
                        [
                            'ulasan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, ipsa!',
                        ]
                    ];
                @endphp
                <p>Belum ada ulasan</p>
                <form action="" method="POST" class="border border-gray-400 p-6 mt-3">
                    @csrf
                    <h2 class="text-xl mb-2 font-medium">
                        Jadilah yang pertama memberikan ulasan <q>{{ $product->title }}</q>
                    </h2>
                    <h3 class="text-base mb-5">Alamat email Anda tidak akan dipublikasikan. Ruas yang wajib ditandai *</h3>
                    <div class="mb-5">
                        <label for="rating" class="block mb-2">Rating</label>
                        <div id="rater" data-input-name="rating_product"></div>
                        {{-- input namenya rating_product --}}
                    </div>
                    <label for="ulasan" class="block mb-2">Ulasan anda</label>
                    <textarea name="ulasan" id="ulasan" rows="5" placeholder="Minimal 5 kata" 
                    class="form-textarea block w-full bg-white"></textarea>
                    <div class="grid grid-cols-2 gap-5 mt-5">
                        <x-input-basic name="nama_lengkap" label="Nama lengkap" add-class="only-alpha-space"
                        placeholder="Mohon gunakan nama lengkap" value="{{ Auth::user()->name ?? '' }}"
                        title="Nama tidak boleh mengandung spesial karakter, angka, dan spasi diawal maupun diakhir"/>
                        <div class="mb-5">
                            <x-input-basic name="email" value="{{ Auth::user()->email ?? '' }}" 
                            placeholder="Mohon gunakan email valid" type="email" label="Email"/>
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
            @include('store.product.list', ['addClass' => "lg:grid-cols-4"])
        </section>
</div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12/dist/js/tabby.polyfills.js"></script>
    <script src="{{ asset('library/rater-js/index.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12/dist/css/tabby-ui.css">
@endpush