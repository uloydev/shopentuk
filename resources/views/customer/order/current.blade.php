@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    @if(session('success'))
    <x-alert type="success">
        <p>{{ session('success') }}</p>
    </x-alert>
    @endif
    <div class="block">
        @forelse ($orders as $order)
            <x-order-item order-id="{{ $order->id }}"
            total-price="{{ $order->price_total }}" total-point="{{ $order->point_total }}" 
            order-date="{{ $order->created_at->format('d M Y G:i') }}" 
            order-status="{{ $order->status }}" >
                @if ($order->status == 'unpaid')
                    <x-slot name="addonBtn">
                        <a href="{{ route('payment.show-confirm', ['order_id'=> $order->id]) }}" class="btn bg-teal-500 px-5 rounded-full top-0 right-0 mr-4">
                            Pay this order
                        </a>
                        <div class="group inline-block relative">
                            <button
                                class="btn bg-red-500 px-5 rounded-full top-0 
                                right-0 mr-4 btn-menu" @if ($order->status === 'refunding') @endif
                                {{-- 
                                    todo: if already request refund, add
                                    'disabled' attribute 
                                --}}>
                                <span class="pr-1 font-semibold flex-1">
                                    Refund
                                </span>
                                <box-icon type='solid' name='chevron-down' 
                                color="#fff"></box-icon>
                            </button>
                            @include('customer.order.refund-form')
                        </div>
                    </x-slot>
                @endif
                <x-slot name="products">
                    @foreach ($order->orderProducts as $orderProduct)
                        <div class="w-full mb-3">
                            <p class="font-bold text-xl">
                                {{ $orderProduct->product->title }} 
                                <span> &times; {{ $orderProduct->quantity }}</span>
                            </p>
                            @if ($orderProduct->is_toko_point)
                                <var class="text-lg">
                                    {{ $orderProduct->point_price }} point
                                </var>
                            @else
                                @if ($orderProduct->discounted_price != 0)
                                    <var class="rupiah-currency text-lg">{{ $orderProduct->discounted_price }}</var>
                                @else
                                    <var class="rupiah-currency text-lg">{{ $orderProduct->original_price }}</var>
                                @endif
                            @endif
                            
                        </div>
                    @endforeach
                </x-slot>
                @if ($order->status === 'refunding')
                <p class="text-blue-500 font-bold">
                    Refund requested, please wait until admin contact you
                </p>
                @endif
            </x-order-item>
        @empty
            <p>tidak ada data untuk ditampilkan</p>
        @endforelse
    </div>
@endsection