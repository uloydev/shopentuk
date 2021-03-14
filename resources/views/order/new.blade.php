@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', ucwords($title))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4">{{ ucwords($title) }}</h1>
                </div>
                <div class="card-body">
                    @if (count($orders) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered no-wrap" id="zero_config">
                                @include('partial.thead', [
                                    'thead' => [
                                        'customer name',
                                        'product price',
                                        'price total',
                                        'point total',
                                        'status',
                                        'shipping price'
                                    ]
                                ])
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="order-item">
                                            <td class="order-item__customer-name">
                                                {{ Str::limit($order->user->name, 10) }}
                                            </td>
                                            <td class="order-item__price"
                                            data-original="{{ $order->product_price }}">
                                                @currency($order->product_price)
                                            </td>
                                            <td class="order-item__point" 
                                            data-original="{{ $order->price_total }}">
                                                @currency($order->price_total)
                                            </td>
                                            <td class="order-item__cat" 
                                            data-original="{{ $order->point_total }}">
                                                {{ $order->point_total }}
                                            </td>
                                            <td class="order-item__sub-cat" 
                                            data-original="{{ $order->status }}">
                                                {{ $order->status }}
                                            </td> 
                                            <td class="order-item__sub-cat" 
                                            data-original="{{ $order->shipping_price }}">
                                                @currency($order->shipping_price)
                                            </td>  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <x-adminmart-alert is-dismissable="false" type="light"
                        message="sedang tidak ada orderan saat ini.">
                            @include('partial.btn-refresh')
                        </x-adminmart-alert>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection