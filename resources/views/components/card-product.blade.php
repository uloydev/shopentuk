<div class="card-product {{ $isHorizontal == 'false' ? 'flex-col' : 'flex-row' }}">
    <div class="flex relative {{ $isHorizontal == 'true' ? 'items-center mr-4' : '' }}">
        <a href="">
            <img src="{{ asset('img/' . $productImg) }}" alt="Image of {{ $productName }}" 
            width="{{ $isHorizontal == 'true' ? '65' : '' }}">
        </a>
        <div class="bg-gray-700 rounded-full text-white h-12 text-xs w-12 flex items-center justify-center absolute right-0 top-0 transform translate-x-4 -translate-y-4 {{ $productIsObral == 'false' ? 'hidden' : ''  }}">
            Obral !
        </div>
    </div>
    <div class="flex-grow">
        <div class="py-4">
            <a class="font-bold text-xl mb-2" href="">{{ Str::words($productName, 4, '...') }}</a>
            <p class="text-gray-700 text-base">
                <a href="/category/{{ $productCategory }}">{{ $productCategory }}</a>
            </p>
        </div>
        <div class="card-product__rating pb-2 mt-auto">
            <p class="text-gray-700 text-base">
                @isset($productOriginalPrice)
                <del>Rp. <var>{{ $productOriginalPrice }}</var></del>
                @endisset
                <span class="font-bold">Rp. <var>{{ $productFinalPrice }}</var></span>
            </p>
    
            @php
                $emptyRating = 5 - $productRating;
                // nanti pindahin ke controller, jelek bjer ada kode php di blade wkwkkw
            @endphp
    
            <div class="mt-2">
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
    </div>
</div>