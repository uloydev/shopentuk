<article class="flex flex-col items-start rounded-lg bg-white shadow-md py-5 px-8 mb-8">
    <div class="relative flex flex-wrap items-center justify-between w-full mb-5">
        <p class="font-bold text-3xl">{{ $productName }}</p>
        {{ $addonBtn ?? '' }}
    </div>
    <img src="{{ asset('storage/img/hoodie.jpg') }}" alt="{{ $productName }} image" class="h-48 rounded-lg">
    <div class="w-full flex justify-between items-end text-md">
        <var class="rupiah-currency text-lg">{{ $productPrice }}</var>
        <ul class="text-gray-800">
            <li class="text-right">
                <span>Qty: {{ $productQty }}</span>
            </li>
            <li class="text-right">
                <time datetime="10-07-2020 15:30">{{ $productBoughtDate }}</time>
            </li>
        </ul>
    </div>
</article>