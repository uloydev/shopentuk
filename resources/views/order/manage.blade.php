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
                                    ]
                                ])
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="product-item">
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                            <td>{{ $order->user->email }}</td>
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