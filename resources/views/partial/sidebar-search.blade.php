<aside class="w-full lg:w-3/12 lg:border-r-2 pr-5 lg:pr-10 order-last lg:order-first mt-10 lg:mt-0">
    <form action="" method="get" class="flex mb-5" id="form-search">
        <input type="text" placeholder="Cari produk..."
            class="appearance-none w-full leading-tight py-2 px-4 border-2 border-r-0 placeholder-gray-700 border-gray-400"
            name="search" value="{{ $httpQuery['search'] ?? ''}}" id="search-input" required>
        <x-btn type="primary" text="Cari" action="submit" />
    </form>
    <div class="py-4">
        <h1 class="text-2xl">Our best sellers</h1>
        <ul class="mt-5 divide-y divide-gray-400">
            @foreach ($bestProducts as $product)
            <li class="pb-3">
                @if ($product->discount)
                <x-card-product data-product-id="{{ $product->id }}"
                    product-img="{{ $product->mainImage ? Storage::url($product->mainImage->url) : 'https://via.placeholder.com/200' }}"
                    product-name="{{ Str::words($product->title, 2) }}"
                    product-category="{{ $product->productCategory->title }}"
                    product-category-id="{{ $product->productCategory->id }}"
                    product-original-price="{{ $product->price }}"
                    product-final-price="{{ $product->discount->discounted_price }}" product-rating="0"
                    product-is-obral="false" is-horizontal="true" is-digital-product="true" />
                @else
                <x-card-product
                    product-img="{{ $product->mainImage ? Storage::url($product->mainImage->url) : 'https://via.placeholder.com/200' }}"
                    product-name="{{ Str::words($product->title, 2) }}"
                    product-category="{{ $product->productCategory->title }}"
                    product-category-id="{{ $product->productCategory->id }}"
                    product-final-price="{{ $product->price }}" product-rating="0" product-is-obral="false"
                    is-horizontal="true" is-digital-product="true" />
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="py-4">
        <h1 class="text-2xl">Browse by product categories</h1>
        <ul class="mt-5">
            <li class="flex justify-between flex-col py-3">
                <a class="{{ !isset($httpQuery['catId']) && !isset($httpQuery['subCatId']) 
                ? 'font-bold' : ''}}" href="{{ route('store.voucher.index', array_merge(
                    array_diff_key($httpQuery, ['subCatId'=>'', 'catId'=>''])
                )) }}" class="justify-between flex">
                    All Category
                </a>
            </li>
        </ul>
        @foreach ($categories->where('is_digital_product', true) as $category)
        <li class="flex justify-between flex-col py-3">
            <a class="{{ isset($httpQuery['catId']) && $httpQuery['catId'] == $category->id ? 'font-bold' : ''}}"
                href="{{ route('store.voucher.index', array_merge(array_diff_key($httpQuery, ['subCatId' => '']),['catId'=> $category->id])) }}"
                title="{{ $category->title }}" class="justify-between flex">
                {{ Str::words($category->title, 3) }}
                <var class="not-italic">{{ '(' . $category->products->count() . ')' }}</var>
            </a>
            <ul class="pl-5">
                @foreach ($category->productSubCategory as $subCategory)
                <li class="py-3">
                    <div class="flex justify-between">
                        <a class="{{ isset($httpQuery['subCatId']) && $httpQuery['subCatId'] == $subCategory->id ? 'font-bold' : ''}}"
                            href="{{ route('store.voucher.index', array_merge(array_diff_key($httpQuery,
                                ['catId' => '']), ['subCatId'=> $subCategory->id])) }}"
                            title="{{ $subCategory->title }}">
                            {{ Str::limit($subCategory->title, 15) }}
                        </a>
                        <var class="not-italic">{{ $subCategory->products->count() }}</var>
                    </div>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </div>
</aside>