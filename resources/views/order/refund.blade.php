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
                                    'refund type',
                                    'bank',
                                    'pemilik rekening',
                                    'nomor rekening',
                                    'nomor telepon',
                                    'order date',
                                    'action'
                                ]
                            ])
                            <tbody>
                                @foreach ($orderToRefund as $order)
                                    <tr class="order-item">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ Str::limit($order->user->name, 10) }}</td>
                                        <td class="order-item__point" 
                                        data-original="{{ $order->price_total }}">
                                            @currency($order->price_total)
                                        </td>
                                        <td class="order-item__sub-cat" 
                                        data-original="{{ $order->status }}">
                                            {{ $order->status }}
                                        </td>
                                        <td>
                                            @if ($order->refund_method)
                                            {{ $order->refund_method }}
                                            @else
                                            User belum memilih metode refund
                                            @endif
                                        </td>
                                        <td>{{ $order->user->bank }}</td>
                                        <td>{{ $order->user->pemilik_rekening }}</td>
                                        <td>{{ $order->user->rekening }}</td>
                                        <td>{{ $order->user->phone }}</td>
                                        <td class="order-item__sub-cat" 
                                        data-original="{{ $order->created_at }}">
                                            {{ $order->created_at->format('d M Y') }}
                                        </td>
                                        <td>
                                            @if ($order->refund_method and !$order->refund)
                                            <button type="button" 
                                            class="btn btn-primary" data-toggle="modal"
                                            data-target="#buktiRefund{{ $order->id }}">
                                                Kirim bukti refund ke customer
                                            </button>
                                            @else
                                            <span>
                                                Belum bisa mengirim bukti refund, 
                                                tunggu user memilih metode refund
                                            </span>
                                            @endif
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
                    <form action="{{ route('refund.kirim-bukti') }}" method="POST"
                    id="formRefund{{ $order->id }}" enctype="multipart/form-data">
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
                                <input type="file" class="custom-file-input" name="struk" id="customFile">
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
                    <button type="submit" class="btn btn-primary" 
                    form="formRefund{{ $order->id }}">
                        Upload bukti refund
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection