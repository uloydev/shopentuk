@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="mb-3">
                        <h1 class="h3">All products</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            <thead>
                                <tr class="text-capitalize">
                                    <th>title</th>
                                    <th>price</th>
                                    <th>point price</th>
                                    <th>category</th>
                                    <th>sub category</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="product-item">
                                        <td class="product-item__title" 
                                        data-original="{{ $product->title }}">
                                            {{ Str::limit($product->title, 10) }}
                                        </td>
                                        <td class="product-item__price" 
                                        data-original="{{ $product->price }}">
                                            @currency($product->price)
                                        </td>
                                        <td class="product-item__point" 
                                        data-original="{{ $product->point_price }}">
                                            {{ $product->point_price }}
                                        </td>
                                        <td class="product-item__category" 
                                        data-original="{{ $product->productCategory->id }}">
                                            {{ Str::words($product->productCategory->title, 1) }}
                                        </td>
                                        <td class="product-item__sub-category" 
                                        data-original="{{ $product->productSubCategory->id }}">
                                            {{ Str::words($product->productSubCategory->title, 2) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $product->id) }}" 
                                            class="btn btn-sm btn-primary btn-rounded mr-2">
                                                View
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                                            class="btn btn-sm btn-warning btn-rounded mr-2"
                                            data-toggle="modal"
                                            data-target="#modal-edit-product"
                                            data-product-title="{{ $product->title }}"
                                            data-product-id="{{ $product->id }}">
                                                Edit
                                            </a>
                                            <form method="POST" class="d-inline-block"
                                            action="{{ route('admin.products.destroy', $product->id) }}">
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
    @include('store.product.edit')
@endsection