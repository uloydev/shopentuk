<article class="flex flex-col items-start rounded-lg bg-white shadow-md py-5 px-8 mb-8">
    <div class="relative flex flex-wrap items-center justify-between w-full mb-5">
        <p class="font-bold text-2xl">Order #{{ $orderId }}</p>
        {{ $addonBtn ?? '' }}
    </div>
    {{ $products ?? ''}}
    <p>Total Price  : {{$totalPrice}}</p>
    <p>Total Point  : {{$totalPoint}}</p>
    <p>Order Status : {{$orderStatus}}</p>
    <div class="w-full text-right">
        <time datetime="10-07-2020 15:30">{{ $orderDate }}</time>
    </div>
</article>