@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
            <x-adminmart-alert is-dismissable="true" 
            message="{{ session('success') }}" type="success"/>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h1 class="h3 text-capitalize">All Payment Confirmation</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap text-center" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'order id',
                                    'full name',
                                    'phone',
                                    'payment date',
                                    'payment_method',
                                    'action'
                                ]
                            ])
                            <tbody>
                                @foreach ($allOrder as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            {{ 
                                                Str::title(
                                                    $order->paymentConfirmation->full_name
                                                ) 
                                            }}
                                        </td>
                                        <td>{{ $order->paymentConfirmation->phone }}</td>
                                        <td>{{ $order->paymentConfirmation->payment_date }}</td>
                                        <td>
                                            {{ 
                                                strtoupper(
                                                    $order->paymentConfirmation->payment_method
                                                )
                                            }}
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <form
                                            method="POST" class="d-inline-block" 
                                            action="{{ route(
                                                'admin.order.change-status', $order->id
                                            ) }}">
                                                @csrf @method('PUT')
                                                <button class="btn btn-sm btn-success 
                                                btn-rounded">
                                                    Accept it
                                                </button>
                                            </form>
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
