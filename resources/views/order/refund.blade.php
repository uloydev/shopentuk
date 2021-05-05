@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', ucwords($title))
@section('content')
<div class="row @if (session('success')) mt-5 @endif">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h1 class="h4">{{ ucwords($title) }}</h1>
            </div>
            <div class="card-body">
                @if (count($orderToRefund) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'order id',
                                    'customer name',
                                    'price total',
                                    'status',
                                    'no resi',
                                    'refund type',
                                    'order date',
                                ]
                            ])
                            <tbody>
                                @foreach ($orderToRefund as $order)
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
                                        <td>
                                            {{-- @if ($order->refund_type)
                                            {{ $order->refund_type }} --}}
                                            <button type="button" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#buktiRefund{{ $order->id }}">
                                                Kirim bukti refund ke customer
                                            </button>
                                            {{-- @endif --}}
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
                    message="sedang tidak ada permintaan refund">
                        @include('partial.btn-refresh')
                    </x-adminmart-alert>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('components')
    @foreach ($orderToRefund as $order)
    <div class="modal fade" id="buktiRefund{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Kirim bukti refund ke customer
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('refund.kirim-bukti') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="user_id" value="{{ $order->user_id }}">
                        <input type="hidden" name="payment_date" 
                        value="{{ $order->paymentConfirmation->payment_date }}">
                        <input type="hidden" name="payment_method" 
                        value="{{ $order->paymentConfirmation->payment_method }}">
                        <div class="form-group">
                            <p>Bukti telah refund</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">
                                    Choose file
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection