@php
    $routes = [
        route('store.product.index'), 
        route('store.voucher.index'), 
        '/game', 
        route('store.toko-point.index')
    ];
    $categories = ['Store', 'Voucher', 'Game', 'Toko Point'];
    $subheadings = [
        'clothing and fashion', 
        'Voucher and Digital stuff', 
        'Play Game and get Point', 
        'Redeem your point with product, voucher or cash'
    ];
@endphp

@for ($i = 0; $i < count($categories); $i++)
<div class="relative">
    <img src="https://picsum.photos/500" class="h-full w-full object-cover">
    <div class="absolute bottom-0 p-10 z-10 w-full max-h-full">
            <x-box-promo 
            heading="{{ $categories[$i] }}" 
            subheading="{{ $subheadings[$i] }}"
            subheadClass="text-base" primary-btn-text="Lihat Sekarang"
            primary-btn-link="{{ $routes[$i] }}"
            primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects"/>
    </div>
    <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
</div>
@endfor