@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="h3">Manage Product Discount</span>
                    <button class="btn btn-primary rounded-pill float-right" data-toggle="modal"
                        data-target="#modal-add-discount"><box-icon name='plus-square' type='solid' animation='tada' color='#ffffff' ></box-icon> Add discount</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'product',
                                    'normal price',
                                    'discounted price'
                                ]
                            ])
                            <tbody>
                                @foreach ($discounts as $discount)
                                    <tr>
                                        <td>
                                            {{ $discount->product->title }}
                                        </td>
                                        <td>
                                            {{ $discount->product->price }}
                                        </td>
                                        <td>
                                            {{ $discount->discounted_price }}
                                        </td>
                                        <td>
                                            <a href="#" 
                                                class="btn btn-sm btn-warning btn-rounded mr-2"
                                                data-toggle="modal"
                                                data-target="#edit-discount-{{ $discount->id }}">
                                                    Edit
                                                </a>
                                                <form method="POST" class="d-inline-block"
                                                action="{{ route('admin.product-discounts.destroy', $product->id) }}">
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
    {{-- @foreach ($discounts as $discount)
        @include('store.product.discount.edit', [
            'id' => 'edit-discount-' . $discount->id
        ])
    @endforeach --}}
    @include('store.product.discount.create')
@endsection
