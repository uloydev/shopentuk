@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert--danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h1 class="h3 text-capitalize">Payment Confirmation list</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap text-center" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'order id',
                                    'order date',
                                    'payment method',
                                    'payer name',
                                    'action'
                                ]
                            ])
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr class="product-item">
                                        <td class="order-id">
                                            {{ $payment->order->id }}
                                        </td>
                                        <td class="order-date">
                                            {{ $payment->order->created_at }}
                                        </td>
                                        <td class="order-payment_method">
                                            {{ $payment->payment_method }}
                                        </td>
                                        <td class="order-payment_name">
                                            {{ $payment->full_name }}
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalShowDetail"
                                            data-order-id="{{ $payment->order->id }}"
                                            data-order-status="{{ $payment->order->status }}"
                                            data-order-date="{{ $payment->order->created_at }}"
                                            data-order-total="@currency($payment->order->price_total)"
                                            data-payment-image="{{ Storage::url($payment->image->file) }}"
                                            data-payment-phone="{{ $payment->phone }}"
                                            data-payment-date="{{ $payment->payment_date }}"
                                            data-payment-method="{{ $payment->payment_method }}"
                                            data-payment-name="{{ $payment->full_name }}"
                                            data-update-url="{{ route('admin.payment.update', $payment->id) }}">
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('components')
    <div class="modal" tabindex="-1" role="dialog" id="modalShowDetail">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">order ID</div>
                        <div class="col-md-6" id="orderId"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">order date</div>
                        <div class="col-md-6" id="orderDate"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">order status</div>
                        <div class="col-md-6" id="orderStatus"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">order price total</div>
                        <div class="col-md-6" id="orderTotal"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">payment name</div>
                        <div class="col-md-6" id="paymentName"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">payment phone</div>
                        <div class="col-md-6" id="paymentPhone"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">payment date</div>
                        <div class="col-md-6" id="paymentDate"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">payment method</div>
                        <div class="col-md-6" id="paymentMethod"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">payment image</div>
                        <div class="col-md-6">
                            <img src="" class="d-block" id="paymentImage" width="100%">
                            <a href="" class="btn btn-primary btn-sm" id="paymentImageDownload" download>Download image</a>
                        </div>
                    </div>
                    <form action="" method="post" id="updatePaymentForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_accepted">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="acceptOrderBtn">Accept Order</button>
                    <button type="button" class="btn btn-danger" id="rejectPaymentBtn">Reject Payment</button>
                </div>
            </div>
        </div>
    </div>
@endsection
