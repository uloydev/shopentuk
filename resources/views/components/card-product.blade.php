<div class="card-product">
    <div class="d-flex relative">
        <img src="{{ $productImg }}" alt="Image of {{ $productName }}" class="card-product__img">
        <div class="bg-gray-700 rounded-full text-white h-12 text-xs w-12 flex items-center justify-center absolute right-0 top-0 transform translate-x-4 -translate-y-4 {{ $productIsObral == 'false' ? 'hidden' : ''  }}">
            Obral !
        </div>
    </div>
    <div class="py-4">
        <a class="font-bold text-xl mb-2" href="">{{ $productName }}</a>
        <p class="text-gray-700 text-base">{{ $productCategory }}</p>
        <p class="text-gray-700 text-base">
            @isset($productOriginalPrice)
            <del>Rp. <var>{{ $productOriginalPrice }}</var></del>
            @endisset
            <span class="font-bold">Rp. <var>{{ $productFinalPrice }}</var></span>
        </p>
    </div>
    <div class="card-product__rating pb-2">
        @php
            $emptyRating = 5 - $productRating;
            // nanti pindahin ke controller, jelek bjer ada kode php di blade wkwkkw
        @endphp

        @if ($productRating > 0)
            @for ($i = 0; $i < $productRating; $i++)
                <box-icon name='star' type='solid'></box-icon>
            @endfor
            @for ($i = 0; $i < $emptyRating; $i++)
                <box-icon name='star' ></box-icon>
            @endfor
        @else
            @for ($i = 0; $i < $emptyRating; $i++)
                <box-icon name='star' ></box-icon>
            @endfor
        @endif
    </div>
</div>