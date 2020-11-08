<div class="block" id="tab-order-history">
    @for ($i = 0; $i < 5; $i++)
    <article class="flex flex-col items-start rounded-lg bg-white shadow-md p-5 mb-8">
        <p class="font-bold text-3xl mb-5">
            T-shirt
        </p>
        <img src="{{ asset('img/example.jpg') }}" alt="T-shirt image" class="h-48 rounded-lg">
        <div class="w-full flex justify-between items-end text-md">
            <var class="rupiah-currency text-lg">{{ 40000 }}</var>
            <ul>
                <li class="text-right">
                    <span>Qty: 20</span>
                </li>
                <li class="text-right">
                    <time datetime="10-07-2020 15:30">10 July 2020 15:30</time>
                </li>
            </ul>
        </div>
    </article>
    @endfor
</div>