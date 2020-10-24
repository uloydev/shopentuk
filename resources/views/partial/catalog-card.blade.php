<div class="relative">
    <img src="{{ $category->image }}" class="h-full object-cover">
    <div class="absolute bottom-0 p-10 z-10">
        {{-- data nya --}}
        <x-box-promo heading="{{ $category->title }}" subheading="{{ $category->description }}"
        subheadClass="text-base" primary-btn-text="Lihat Sekarang" primary-btn-link="shop.com"
        primary-btn-type="bg-blue-300 hover:bg-blue-100 text-gray-800 border border-gray-400 rounded shadow font-architects" />
        {{-- end of data nya --}}
    </div>
    <div class="absolute top-0 left-0 bg-gray-900 bg-opacity-50 h-full w-full"></div>
</div>