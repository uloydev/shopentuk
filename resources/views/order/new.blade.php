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
                                        'no resi',
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
                                                {{ Str::limit($order->user->name, 10) }}
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
                                            data-original="{{ $order->no_resi ? 
                                            $order->no_resi : '' }}">
                                                @if (empty($order->no_resi))
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputResiModal"
                                                data-order-id="{{ $order->id }}">
                                                    Input resi
                                                </button>
                                                @else
                                                    {{ $order->no_resi }}
                                                @endif
                                            </td>
                                            <td class="order-item__sub-cat">
                                                @if ($order->status === 'paid')
                                                <form action="{{ route(
                                                    'admin.order.cancel', $order->id
                                                ) }}"
                                                method="post">
                                                    @csrf @method('PUT')
                                                    <button type="submit" class="btn btn-danger"
                                                    data-order-id="{{ $order->id }}">
                                                        Cancel order
                                                    </button>
                                                </form>
                                                @else
                                                Orderan sudah dikirim
                                                @endif
                                            </td>
                                            <td class="order-item__sub-cat" 
                                            data-original="{{ $order->created_at }}">
                                                {{ $order->created_at->format('d M Y') }}
                                            </td>
                                        </tr>
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
                                            <td class="order-item__sub-cat" 
                                            data-original="{{ $order->created_at }}">
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
                    <x-input-template label="No resi" name="no_resi"
                    placeholder="Masukan no resi disini" required />
                    <button type="submit" class="btn btn-success">Submit nomor resi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection