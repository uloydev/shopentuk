<div class="relative">
    <img src="{{ $category->image }}" class="h-full object-cover">
    <div class="absolute bottom-0 p-10 z-10 w-full max-h-full">
        {{-- data nya --}}
        @if ($category->is_digital_product)
            <x-box-promo 
            heading="{{ Str::words($category->title, 1) }}" 
            subheading="{{ Str::words($category->description, 5) }}"
            subheadClass="text-base" primary-btn-text="Lihat Sekarang" primary-btn-link="{{ route('store.voucher.index', ['catId' => $category->id]) }}"
            primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects" 
            />
        @else
            <x-box-promo 
            heading="{{ Str::words($category->title, 1) }}" 
            subheading="{{ Str::words($category->description, 5) }}"
            subheadClass="text-base" primary-btn-text="Lihat Sekarang" 
            primary-btn-link="{{ route('store.product.index', ['catId' => $category->id]) }}"
            primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects" 
            />
        @endif
        {{-- end of data nya --}}
    </div>
    <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
</div>