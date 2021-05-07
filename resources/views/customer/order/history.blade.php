@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        @forelse ($orders as $order)
            <x-order-item order-id="{{ $order->id }}" total-price="{{ $order->price_total }}"
                total-point="{{ $order->point_total }}" order-date="{{ $order->created_at }}"
                order-status="{{ $order->status }}">
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
                            @if ($order->status == 'finished' and $orderProduct->is_digital)
                                <p class="font-bold">Voucher Code : {{ $orderProduct->voucher_code }}</p>
                                <small class="text-red-500">jika quantity lebih dari 1, kode dipisahkan dengan koma (,)</small>
                            @endif
                        </div>
                    @endforeach
                </x-slot>
                @if ($order->status == 'refunded')
                    <p class="font-bold">
                        Refund berhasil sebesar @currency($order->price_total) dan {{ $order->point_total }} point.
                    </p>
                    @if ($order->refund_method != 'point')
                        <a class="text-blue-500" href="{{ Storage::url($order->refund->struk) }}" download>
                            Download bukti refund
                        </a>
                    @endif
                @endif
            </x-order-item>
        @empty
            <p>tidak ada data untuk ditampilkan</p>
        @endforelse
    </div>
@endsection
