@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        @forelse ($orders as $order)
            <x-order-item order-id="{{ $order->id }}"
            total-price="{{ $order->price_total }}" total-point="{{ $order->point_total }}" 
            order-date="{{ $order->created_at }}" order-status="{{ $order->status }}" >
                <x-slot name="products">
                    @foreach ($order->orderProducts as $orderProduct)
                        <div class="w-full mb-3">
                            <p class="font-bold text-xl">
                                {{ $orderProduct->product->title }} 
                                <span> &times; {{ $orderProduct->quantity }}</span>
                            </p>
                            @if ($orderProduct->is_toko_point)
                                <var class="text-lg">{{ $orderProduct->point_price }} point</var>
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
                @if($order->refund)
                <p class="font-bold">
                    Refund berhasil. 
                    <a class="text-blue-500" 
                    href="{{ Storage::url($order->refund->struk) }}" download>
                        Download bukti refund
                    </a>
                </p>
                @endif
            </x-order-item>
        @empty
            <p>tidak ada data untuk ditampilkan</p>
        @endforelse
    </div>
@endsection