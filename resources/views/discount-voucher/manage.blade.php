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

                <div class="card-header mb-3 d-flex flex-column 
                flex-lg-row justify-content-between">
                    <span class="h3 mb-3 mb-lg-0 d-block d-lg-inline">All Discount Coupon</span>
                    <button class="btn btn-primary rounded-pill d-flex d-lg-inline-flex align-items-center justify-content-center col-12 col-md-auto" data-toggle="modal"
                    data-target="#modal-add-voucher"><box-icon name='plus-square' type='solid' animation='tada' color='#ffffff' ></box-icon> Add voucher</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'name',
                                    'code',
                                    'discount',
                                    'is_used',
                                    'Action'
                                ]
                            ])
                            <tbody>
                                @foreach ($vouchers as $voucher)
                                    <tr class="voucher-item">
                                        <td>
                                            {{$voucher->name}}
                                        </td>
                                        <td>
                                            {{$voucher->code}}
                                        </td>
                                        <td>
                                            {{$voucher->discount_value}}
                                        </td>
                                        <td>
                                            {{$voucher->is_used ? 'yes' : 'no'}}
                                        </td>
                                        <td>
                                            @if ( ! $voucher->is_used )
                                                <a class="btn btn-sm btn-warning btn-rounded mr-2"
                                                data-toggle="modal"
                                                data-target="#modal-edit-voucher"
                                                data-voucher-name="{{ $voucher->name }}"
                                                data-voucher-code="{{ $voucher->code }}"
                                                data-voucher-discount-value="{{ $voucher->discount_value }}"
                                                data-voucher-expired-at="{{ $voucher->formatted_expired_time }}"
                                                data-update-url="{{ route('admin.vouchers.update', $voucher->id) }}">
                                                    Edit
                                                </a>
                                            @endif
                                            <form method="POST" class="d-inline-block"
                                            action="{{ route('admin.vouchers.destroy', $voucher->id) }}">
                                                @csrf @method('DELETE')
                                                <button type="submit" 
                                                class="btn btn-sm btn-danger btn-rounded">
                                                    Delete
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

@section('components')
    @include('discount-voucher.edit')
    @include('discount-voucher.create')
@endsection