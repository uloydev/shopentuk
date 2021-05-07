@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        @forelse ($orders as $order)
            <x-order-item order-id="{{ $order->id }}"
            total-price="{{ $order->price_total }}" total-point="{{ $order->point_total }}" 
            order-date="{{ $order->created_at->format('d M Y G:i') }}" 
            order-status="{{ $order->status }}" order-resi="{{ $order->no_resi }}">
                <x-slot name="addonBtn">
                    @if ($order->status == 'unpaid')
                        <a href="{{ route('payment.show-confirm', ['order_id'=> $order->id]) }}" class="btn bg-teal-500 px-5 rounded-full top-0 right-0 mr-4">
                            Pay this order
                        </a>
                        <form action="{{ route('my-account.cancel.order', $order->id) }}" method="post">
                            @csrf @method('PUT')
                            <button type="submit"
                            class="btn bg-red-500 px-5 rounded-full top-0 right-0 mr-4">
                                Cancel
                            </button>
                        </form>
                    @elseif($order->status === 'refunding' and $order->refund_method === null)
                        <div class="group inline-block relative">
                            <button
                                class="btn bg-red-500 px-5 rounded-full top-0 
                                right-0 mr-4 btn-menu">
                                <span class="pr-1 font-semibold flex-1">
                                    Refund
                                </span>
                                <box-icon type='solid' name='chevron-down' 
                                color="#fff"></box-icon>
                            </button>
                            @include('customer.order.refund-form')
                        </div>
                    @elseif($order->status === 'shipping')
                        <form action="{{ route('my-account.finish.order', $order->id) }}" 
                        method="POST">
                            @csrf @method('PUT')
                            <button type="submit" class="btn btn--secondary">
                                Confirm Arrived
                            </button>
                        </form>
                    @endif
                </x-slot>
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
                            @if (in_array($order->status, ['shipping', 'finished']) and $orderProduct->is_digital)
                                <p class="font-bold">Voucher Code : {{ $orderProduct->voucher_code }}</p>
                                <small class="text-red-500">jika quantity lebih dari 1, kode dipisahkan dengan koma (,)</small>
                            @endif
                        </div>
                    @endforeach
                </x-slot>
                @if ($order->status === 'refunding' and $order->refund_method)
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