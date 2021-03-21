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
                                        'title product',
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
                                        'customer email',
                                        'customer address',
                                        'customer province',
                                    ]
                                ])
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="product-item">
                                            @include('partial.tbody', [
                                                'td' => [
                                                    '',
                                                    // Str::limit(
                                                    //     $order->orderProducts->product->title, 10
                                                    // ) ?? '-',
                                                    $order->product_price,
                                                    $order->point_price,
                                                    $order->price_total,
                                                    $order->point_total,
                                                    $order->weight_total,
                                                    $order->voucher_discount,
                                                    $order->status,
                                                    $order->no_resi,
                                                    $order->shipping_price,
                                                    $order->shipping_point,
                                                    $order->user->email,
                                                    $order->userAddress->title,
                                                    $order->userAddress->getProvinceAttribute(),
                                                ]
                                            ])
                                        </tr>
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