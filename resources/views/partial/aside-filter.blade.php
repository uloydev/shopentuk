<aside class="w-full lg:w-3/12 lg:border-r-2 pr-5 lg:pr-10 order-last lg:order-first mt-10 lg:mt-0">
    <form action="" method="get" class="flex mb-5">
        <input type="text" placeholder="Cari produk..."
        class="appearance-none w-full leading-tight py-2 px-4 border-2 border-r-0 placeholder-gray-700 border-gray-400" required>
        <button type="submit" class="bg-gray-300 hover:bg-gray-900 py-2 px-4 border-2 border-gray-400">
            Cari
        </button>
    </form>
    <div class="py-4">
        <h1 class="text-3xl">Our best sellers</h1>
        <ul class="mt-3 divide-y divide-gray-400">
            @for ($i = 0; $i < 3; $i++)
                <li class="pb-3">
                    <x-card-product product-img="{{ asset('storage/img/telkomsel.jpg') }}" 
                    product-name="{{ 'title' }}" product-category="{{ 'category' }}" 
                    product-final-price="{{ 3000 }}" product-rating="{{ rand(1, 5) }}"
                    product-is-obral="false" is-horizontal="true" />
                </li>
            @endfor
        </ul>
    </div>
</aside>