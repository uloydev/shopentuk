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
                    <h1 class="h3 text-capitalize">All Products</h1>
                    <button type="button" data-toggle="modal" data-target="#modal-add-product"
                        class="btn btn-sm btn-primary btn-rounded mr-2">
                        Add new product
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap text-center" id="zero_config">
                            @include('partial.thead', [
                            'thead' => [
                            'id',
                            'title',
                            'price',
                            'point price',
                            'point bonus',
                            'category',
                            'sub category',
                            'action'
                            ]
                            ])
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="product-item">
                                        <td class="product-item__id" data-original="{{ $product->id }}">
                                            {{ $product->id }}
                                        </td>
                                        <td class="product-item__title" data-original="{{ $product->title }}">
                                            {{ $product->title }}
                                        </td>
                                        <td class="product-item__price" data-original="{{ $product->price }}">
                                            @currency($product->price)
                                        </td>
                                        <td class="product-item__point" data-original="{{ $product->point_price }}">
                                            {{ $product->point_price }}
                                        </td>
                                        <td class="product-item__point_bonus" data-original="{{ $product->point_bonus }}">
                                            {{ $product->point_bonus }}
                                        </td>
                                        <td class="product-item__category"
                                            data-original="{{ $product->productCategory->id }}">
                                            {{ Str::words($product->productCategory->title, 1) }}
                                        </td>
                                        <td class="product-item__sub-category"
                                            data-original="{{ $product->sub_category_id }}">
                                            {{ Str::words($product->productSubCategory->title, 2) }}
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('store.product.show', $product->slug) }}"
                                                class="btn btn-sm btn-primary btn-rounded mr-2">
                                                View
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-sm btn-warning btn-rounded mr-2" data-toggle="modal"
                                                data-target="#modal-edit-product"
                                                data-product-title="{{ $product->title }}"
                                                data-product-id="{{ $product->id }}"
                                                data-category-id="{{ $product->category_id }}"
                                                data-sub-category-id="{{ $product->sub_category_id }}"
                                                data-product-desc="{{ $product->description }}"
                                                data-update-url="{{ route('admin.products.update', $product->id) }}"
                                                data-is-redeem="{{ $product->is_redeem }}"
                                                data-weight="{{ $product->weight }}"
                                                data-point-bonus="{{ $product->point_bonus }}"
                                                data-image-url="{{ $product->mainImage ? Storage::url($product->mainImage->url) : 'https://via.placeholder.com/200' }}">
                                                Edit
                                            </a>
                                            <form id="formDelete{{ $product->id }}" method="POST" class="d-inline-block"
                                                action="{{ route('admin.products.destroy', $product->id) }}">
                                                @csrf @method('DELETE')
                                            </form>
                                            <button class="btn btn-sm btn-danger btn-rounded btn-delete-product" data-product-id='{{ $product->id }}'>
                                                Delete
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
    @include('store.product.edit')
    @include('store.product.create')
    <div class="modal" tabindex="-1" role="dialog" id="modalConfirmDelete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Apa Anda yakin ingin menghapus Product ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Semua order yang terkait dengan Product ini akan ikut terhapus.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="confirmDeleteBtn">DELETE</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
@endsection
