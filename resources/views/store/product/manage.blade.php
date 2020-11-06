@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
 <div class="table-responsive">
     <table class="table table-striped table-bordered no-wrap" id="zero_config">
         <thead>
             <tr class="text-capitalize">
                <th>title</th>
                <th>price</th>
                <th>point_price</th>
                <th>category</th>
                <th>sub category</th>
                <th>action</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($products as $product)
                <tr>
                    <td>{{ Str::limit($product->title, 20) }}</td>
                    <td>@currency($product->price)</td>
                    <td>{{ $product->point_price }}</td>
                    <td>{{ Str::words($product->productCategory->title, 1) }}</td>
                    <td>{{ Str::words($product->productSubCategory->title, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->slug) }}" 
                        class="btn btn-sm btn-warning btn-rounded mr-2">
                            Edit
                        </a>
                        <a href="{{ route('admin.products.show', $product->slug) }}" 
                        class="btn btn-sm btn-primary btn-rounded mr-2">
                            View
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
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