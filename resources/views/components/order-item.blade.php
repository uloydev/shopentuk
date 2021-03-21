<article class="flex flex-col items-start rounded-lg bg-white shadow-md py-5 px-8 mb-8">
    <div class="relative flex flex-wrap items-center w-full mb-5">
        <p class="font-bold text-2xl mr-auto">Order #{{ $orderId }}</p>
        {{ $addonBtn ?? '' }}
    </div>
    {{ $products ?? ''}}
    <p>Total Price  : {{$totalPrice}}</p>
    <p>Total Point  : {{$totalPoint}}</p>
    <p>Order Status : {{$orderStatus}}</p>
    <div class="w-full text-right flex justify-between mt-5">
        {{-- todo: add logic show this text only when order have refund request  --}}
        <p class="text-blue-500 font-bold">
            Refund requested, please wait until admin contact you
        </p>

        <time datetime="10-07-2020 15:30">{{ $orderDate }}</time>
    </div>
</article>