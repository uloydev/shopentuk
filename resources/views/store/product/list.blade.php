<div class="p-5 -mx-5 overflow-hidden grid grid-cols-1 gap-x-5 gap-y-10 md:grid-cols-2 lg:gap-x-8 lg:gap-y-10 justify-items-center {{ $addClass  }}">
    @forelse ($products as $product)
        @if ($product->discount)
        <x-card-product
            product-img="{{ 'example.jpg' }}" 
            product-name="{{ $product->title }}"
            product-category="{{ $product->productCategory->title }}" 
            product-category-id="{{ $product->productCategory->id }}" 
            product-original-price="{{ $product->price }}"
            product-final-price="{{ $product->discount->discounted_price }}"
            product-rating="3" 
            is-horizontal="false"
            product-is-obral="true" />
        @else
            <x-card-product 
                product-img="{{ 'example.jpg' }}" 
                product-name="{{ $product->title }}"
                product-category="{{ $product->productCategory->title }}" 
                product-category-id="{{ $product->productCategory->id }}" 
                product-final-price="{{ $product->price }}"
                product-rating="0" 
                is-horizontal="false"
                product-is-obral="false" />
        @endif
    @empty
        <figure class="col-span-full flex justify-center flex-col items-center">
            <img src="{{ asset('img/static/empty.png') }}" alt="Empty catalog" class="h-64">
            <figcaption>
                <p class="text-2xl text-center">
                    Oops, currently we don't have any product. <br> 
                    Please check it later
                </p>
            </figcaption>
        </figure>
    @endforelse
</div>