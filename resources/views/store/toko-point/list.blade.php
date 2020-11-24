<div class="p-5 -mx-5 overflow-hidden grid grid-cols-1 gap-x-5 gap-y-10 md:grid-cols-2 lg:gap-x-8 lg:gap-y-10 justify-items-center {{ $addClass  }}">
    @foreach ($products as $product)
        <x-card-product 
            product-img="{{ $product->mainImage ? $product->mainImage->url : 'static/telkomsel.jpg' }}" 
            product-name="{{ $product->title }}"
            product-category="{{ $product->productCategory->title ?? ''}}" 
            product-category-id="{{ $product->productCategory->id ?? ''}}" 
            product-token-price="{{ $product->token_price }}"
            product-rating="0" 
            is-horizontal="false"
            product-is-obral="false"
            is-toko-point="true" />
    @endforeach
</div>