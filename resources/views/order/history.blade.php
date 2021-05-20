@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-12">
        <div id="accordion" class="custom-accordion mb-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 font-weight-bold">{{ ucwords($title) }}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($orders) == 0)
                        <x-adminmart-alert is-dismissable="false" 
                        message="There's no order right now" type="secondary">
                            @include('partial.btn-refresh')
                        </x-adminmart-alert>
                        @else
                            <table class="table table-striped table-bordered no-wrap" id="zero_config">
                                @include('partial.thead', [
                                    'thead' => [
                                        'order id',
                                        'customer name',
                                        'customer email',
                                        'order date',
                                        'product price',
                                        'product point ',
                                        'price total',
                                        'point total',
                                        'weight total',
                                        'voucher discount',
                                        'status',
                                        'no resi',
                                        'shipping price',
                                        'shipping point',
                                        'customer address',
                                        'customer province',
                                        'detail',
                                    ]
                                ])
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="product-item">
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                            <td>@currency($order->product_price)</td>
                                            <td>{{ $order->point_price ?? '-' }}</td>
                                            <td>{{ $order->price_total }}</td>
                                            <td>{{ $order->point_total }}</td>
                                            <td>{{ $order->weight_total }}</td>
                                            <td>{{ $order->voucher_discount }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->no_resi }}</td>
                                            <td>{{ $order->shipping_price }}</td>
                                            <td>{{ $order->shipping_point }}</td>
                                            <td>{{ $order->userAddress->title }}</td>
                                            <td>
                                                {{ $order->userAddress->getProvinceAttribute() }}
                                            </td>
                                            <td><button type="button" class="my-2 btn btn-primary" data-toggle="modal"
                                                data-target="#orderDetailModal{{ $order->id }}">
                                                Order Detail
                                            </button></td>
                                        </tr>

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

                                                        <hr>
                                                        @if ($order->orderProducts->where('is_digital', false)->count())
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h4 class="mt-2 mb-0">Product</h4>
                                                                </div>
                                                            </div>
                                                            @foreach ($order->orderProducts->where('is_digital', false) as $item)
                                                                <div class="row">
                                                                    <div class="col">{{ $item->product->title }} @
                                                                        {{ $item->quantity }} qty</div>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                        @if ($order->orderProducts->where('is_digital', true)->count())
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h4 class="mt-2 mb-0">Voucher</h4>
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
                        @endif
                    </div>
                </div>
            </div>
        </div> <!-- end custom accordions-->
    </div>
</div>
@endsection