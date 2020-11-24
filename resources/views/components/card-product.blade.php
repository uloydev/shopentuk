@php
    $slug = Str::slug($productName);
    $route = $isDigitalProduct ? 'store.voucher.' : 'store.product.';
    $route = $isTokoPoint ? 'store.toko-point.' : $route;
@endphp

<div class="card-product flex {{ $isHorizontal == 'false' ? 'flex-col' : 'flex-row' }}" {{ $attributes }}>
    <div class="flex relative {{ $isHorizontal == 'true' ? 'items-center mr-4' : '' }}">
        <a href="{{ route($route . 'show', $slug) }}" class="block">
            <img src="{{ $productImg }}" alt="Image of {{ $productName }}" 
            width="{{ $isHorizontal == 'true' ? '65' : '' }}">
        </a>
        <div class="bg-gray-700 rounded-full text-white h-12 text-xs w-12 flex items-center justify-center
        absolute right-0 top-0 transform translate-x-4 -translate-y-4 {{ $productIsObral == 'false' ? 'hidden' : ''  }}">
            Obral !
        </div>
    </div>
    <div class="flex-grow">
        <div class="py-4 overflow-hidden">
            <a class="font-bold text-xl mb-2 break-words" href="{{ route($route . 'show', $slug) }}">
                {{ Str::words($productName, 4, '...') }}
            </a>
            <p class="text-gray-700 text-base">
                <a href="{{ route($route.'index', ['catId'=>$productCategoryId]) }}">
                    {{ $productCategory }}
                </a>
            </p>
        </div>
        <div class="card-product__rating pb-2 mt-auto">
            <p class="text-gray-700 text-base">
                @isset($productOriginalPrice)
                <del>
                    <var class="rupiah-currency">{{ $productOriginalPrice }}</var>
                </del>
                @endisset
                <span class="font-bold">
                    @isset($productFinalPrice)
                        <var class="rupiah-currency">{{ $productFinalPrice }}</var>
                    @endisset
                    @isset($productPointPrice)
                        <var>{{ $productPointPrice }} point</var>
                    @endisset
                </span>
            </p>
        </div>
    </div>
</div>