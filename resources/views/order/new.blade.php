@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', ucwords($title))
@section('content')
    <div class="row @if (session('success')) mt-5 @endif">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4">Paid Order</h1>
                </div>
                <div class="card-body">
                    @if (count($orderPaid) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered no-wrap" id="zero_config">
                                @include('partial.thead', [
                                'thead' => [
                                'order id',
                                'customer name',
                                'price total',
                                'point total',
                                'status',
                                'action',
                                'order date'
                                ]
                                ])
                                <tbody>
                                    @foreach ($orderPaid as $order)
                                        <tr class="order-item">
                                            <td>
                                                {{ $order->id }}
                                            </td>
                                            <td class="order-item__customer-name">
                                                {{ $order->user->name }}
                                            </td>
                                            <td class="order-item__point" data-original="{{ $order->price_total }}">
                                                @currency($order->price_total)
                                            </td>
                                            <td class="order-item__cat" data-original="{{ $order->point_total }}">
                                                {{ $order->point_total }}
                                            </td>
                                            <td class="order-item__sub-cat" data-original="{{ $order->status }}">
                                                {{ $order->status }}
                                            </td>
                                            <td class="order-item__sub-cat">
                                                @if (empty($order->no_resi) && $order->orderProducts->where('is_digital', false)->count())
                                                    <button type="button" class=" my-2 btn btn-primary" data-toggle="modal"
                                                        data-target="#inputResiModal" data-order-id="{{ $order->id }}">
                                                        Input Resi
                                                    </button>
                                                @endif
                                                @if ($order->status === 'paid')
                                                    <form action="{{ route('admin.order.cancel', $order->id) }}"
                                                        method="post">
                                                        @csrf @method('PUT')
                                                        <button type="submit" class="btn btn-danger"
                                                            data-order-id="{{ $order->id }}">
                                                            Cancel order
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($order->orderProducts->where('is_digital', true)->count() && empty($order->orderProducts->firstWhere('is_digital', true)->voucher_code))
                                                    <button type="button" class="my-2 btn btn-primary" data-toggle="modal"
                                                        data-target="#inputVoucherCodeModal{{ $order->id }}">
                                                        Input Voucher Code
                                                    </button>
                                                @endif
                                                <button type="button" class="my-2 btn btn-primary" data-toggle="modal"
                                                    data-target="#orderDetailModal{{ $order->id }}">
                                                    Order Detail
                                                </button>
                                            </td>
                                            <td class="order-item__sub-cat" data-original="{{ $order->created_at }}">
                                                {{ $order->created_at->format('d M Y') }}
                                            </td>
                                        </tr>
                                        @if ($order->orderProducts->where('is_digital', true)->count() && $order->status == 'paid')
                                            <div class="modal fade" id="inputVoucherCodeModal{{ $order->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Input Voucher Code
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('admin.order.submit-voucher-code', $order->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                @foreach ($order->orderProducts->where('is_digital', true) as $orderItem)
                                                                    <input type="hidden" name="order_product_id[]" required
                                                                        value="{{ $orderItem->id }}">
                                                                    <x-input-template
                                                                        label="{{ $orderItem->product->title }} @ {{ $orderItem->quantity }} qty"
                                                                        name="voucher_code[]"
                                                                        placeholder="jika lebih dari 1 gunakan (,)(koma) sebagai pemisah"
                                                                        required />
                                                                @endforeach
                                                                <button type="submit" class="btn btn-success">Submit voucher
                                                                    code</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="modal fade" id="orderDetailModal{{ $order->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Order Detail
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-4 bg-light">
                                                        <div class="row">
                                                            <div class="col-md-6">Order Id</div>
                                                            <div class="col-md-6">{{ $order->id }}</div>
                                                        </div>
                                                        @if ($order->orderProducts->where('is_digital', false)->count())
                                                            <div class="row">
                                                                <div class="col-md-6">Resi</div>
                                                                <div class="col-md-6">
                                                                    {{ $order->no_resi ? $order->no_resi : 'resi belum di input' }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($order->orderProducts->where('is_digital', true)->count())
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h4 class="mt-5 mb-0">Voucher</h4>
                                                                </div>
                                                            </div>
                                                            @foreach ($order->orderProducts->where('is_digital', true) as $item)
                                                                <div class="row">
                                                                    <div class="col-md-6">{{ $item->product->title }} @
                                                                        {{ $item->quantity }} qty</div>
                                                                    <div class="col-md-6">
                                                                        {{ $item->voucher_code ? $item->voucher_code : 'kode belum di input' }}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <x-adminmart-alert is-dismissable="false" type="light"
                            message="sedang tidak ada orderan yang belum dibayar">
                            @include('partial.btn-refresh')
                        </x-adminmart-alert>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4">Unpaid Order</h1>
                </div>
                <div class="card-body">
                    @if (count($orderUnpaid) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered no-wrap" id="zero_config">
                                @include('partial.thead', [
                                'thead' => [
                                'order id',
                                'customer name',
                                'customer email',
                                'product price',
                                'price total',
                                'point total',
                                'status',
                                'shipping price',
                                'order date'
                                ]
                                ])
                                <tbody>
                                    @foreach ($orderUnpaid as $order)
                                        <tr class="order-item">
                                            <td>
                                                {{ $order->id }}
                                            </td>
                                            <td class="order-item__customer-name">
                                                {{ Str::limit($order->user->name, 10) }}
                                            </td>
                                            <td class="order-item__customer-name">
                                                {{ Str::limit($order->user->email) }}
                                            </td>
                                            <td class="order-item__price" data-original="{{ $order->product_price }}">
                                                @currency($order->product_price)
                                            </td>
                                            <td class="order-item__point" data-original="{{ $order->price_total }}">
                                                @currency($order->price_total)
                                            </td>
                                            <td class="order-item__cat" data-original="{{ $order->point_total }}">
                                                {{ $order->point_total }}
                                            </td>
                                            <td class="order-item__sub-cat" data-original="{{ $order->status }}">
                                                {{ $order->status }}
                                            </td>
                                            <td class="order-item__sub-cat" data-original="{{ $order->shipping_price }}">
                                                @currency($order->shipping_price)
                                            </td>
                                            <td class="order-item__sub-cat" data-original="{{ $order->created_at }}">
                                                {{ $order->created_at->format('d M Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <x-adminmart-alert is-dismissable="false" type="light"
                            message="sedang tidak ada orderan yang belum dibayar.">
                            @include('partial.btn-refresh')
                        </x-adminmart-alert>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('components')
    <div class="modal fade" id="inputResiModal" tabindex="-1" aria-labelledby="inputResiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Input resi untuk order id <b id="order-id"></b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payment.input-resi') }}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" required>
                        <x-input-template label="No resi" name="no_resi" placeholder="Masukan no resi disini" required />
                        <button type="submit" class="btn btn-success">Submit nomor resi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
