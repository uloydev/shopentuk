@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
<div class="bg-white shadow-md px-5 pb-8 pt-2">
    <ul class="mt-5 divide-y divide-gray-400">
        @forelse ($favoriteProduct as $favorite)
            <li class="pb-3">
                @if ($favorite->product->discount)
                    <x-card-product
                    class="items-center"
                    product-img="{{ $favorite->mainImage ? Storage::url($favorite->mainImage->url) : 'https://via.placeholder.com/200' }}"
                    product-name="{{ Str::words($favorite->product->title, 2) }}"
                    product-category="{{ $favorite->product->productCategory->title }}" 
                    product-category-id="{{ $favorite->product->productCategory->id }}" 
                    product-original-price="{{ $favorite->product->price }}"
                    product-final-price="{{ $favorite->product->discount->discounted_price }}"
                    product-rating="0" 
                    product-is-obral="false"
                    is-horizontal="true"
                    is-digital-product="true">
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input min="1" max="999" value="1" name="quantity"
                            type="number" required
                            class="appearance-none bg-white border border-gray-400 p-1 
                            text-center w-12 mr-2">
                            <input type="hidden" name="product_id" 
                            value="{{ $favorite->product_id }}">
                            <x-btn type="primary" text="Tambah ke keranjang" action="submit"/>
                        </form>
                        <form action="{{ route('my-account.favorite.remove', $favorite->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <x-btn type="primary" text="" action="submit">
                                <box-icon type='solid' name='trash-alt'></box-icon>
                            </x-btn>
                        </form>
                    </x-card-product>
                @else
                    <x-card-product
                    class="items-center"
                    product-img="{{ $favorite->product->mainImage ? Storage::url($favorite->product->mainImage->url) : 'https://via.placeholder.com/200' }}"
                    product-name="{{ Str::words($favorite->product->title, 2) }}"
                    product-category="{{ $favorite->product->productCategory->title }}" 
                    product-category-id="{{ $favorite->product->productCategory->id }}" 
                    product-final-price="{{ $favorite->product->price }}"
                    product-rating="0"
                    product-is-obral="false"
                    is-horizontal="true"
                    is-digital-product="true">
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input value="1" name="quantity" type="hidden" required>
                            <input type="hidden" name="product_id" 
                            value="{{ $favorite->product_id }}">
                            <x-btn type="primary" text="Tambah ke keranjang" action="submit"/>
                        </form>
                        <form action="{{ route('my-account.favorite.remove', $favorite->id) }}" 
                        method="POST" class="ml-3">
                            @csrf @method('DELETE')
                            <x-btn type="danger" text="" action="submit">
                                <box-icon type='solid' color="#fff" name='trash-alt'></box-icon>
                            </x-btn>
                        </form>
                    </x-card-product>
                @endif
            </li>
        @empty
        <div class="text-center font-bold py-5 text-lg">
            There's no wishlist here
        </div>
        @endforelse
    </ul>
</div>
@endsection