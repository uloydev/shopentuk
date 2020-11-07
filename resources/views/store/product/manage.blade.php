@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
 <div class="table-responsive">
     <div class="mb-3">
        <h1 class="h3">All products</h1>
        <small class="text-success font-weight-bold">
            Click the data on each column for editing
        </small>
     </div>
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
                    <td class="product-item__title" data-original="{{ $product->title }}">
                        {{ Str::limit($product->title, 10) }}
                    </td>
                    <td class="product-item__price" data-original="{{ $product->price }}">
                        @currency($product->price)
                    </td>
                    <td class="product-item__point" data-original="{{ $product->point_price }}">
                        {{ $product->point_price }}
                    </td>
                    <td class="product-item__cat" data-original="{{ $product->productCategory->title }}">
                        {{ Str::words($product->productCategory->title, 1) }}
                    </td>
                    <td class="product-item__sub-cat" data-original="{{ $product->productSubCategory->title }}">
                        {{ Str::words($product->productSubCategory->title, 2) }}
                    </td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->slug) }}" 
                        class="btn btn-sm btn-primary btn-rounded mr-2">
                            View
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST"
                        class="d-inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
         </tbody>
     </table>
 </div>
@endsection