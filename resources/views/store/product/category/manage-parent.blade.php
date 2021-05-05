@extends('layouts.template')

@section('body-id', Str::camel($title))

@section('title', ucfirst($title))

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="h3">Product Category</h1>
                <button type="button" data-toggle="modal" 
                data-routing="{{ route('admin.all-category.store') }}"
                class="btn btn-sm waves-effect waves-light btn-rounded btn-primary add-primary-category">
                    Add new category
                </button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($categories as $category)
                    <li class="list-group-item d-flex align-items-center">
                        <span class="mr-auto primary-category__title">
                            {{ Str::words($category->title, 1) }}
                        </span>
                        <a href="{{ route('admin.all-category.sub.index', $category->id) }}" class="badge badge-primary badge-pill ml-auto">view sub categories</a>
                        <a href="javascript:void(0);"
                        data-routing="{{ route('admin.all-category.update', $category->id) }}"
                        data-is-digital="{{ $category->is_digital_product }}"
                        data-toggle="modal" data-desc="{{ $category->description }}"
                        class="badge badge-warning badge-pill ml-2 edit-primary-category">
                            Edit
                        </a>
                        <form class="ml-2 d-inline-block" method="POST" 
                        title="delete primary category {{ $category->id }}"
                        action="{{ route('admin.all-category.destroy', $category->id) }}">
                            @csrf @method('DELETE')
                            <button class="badge badge-danger badge-pill" 
                            type="submit" data-toggle="modal">
                                Delete
                            </button>
                        </form>
                    </li>
                    @empty
                    <li class="list-group-item">
                        There's no category right now
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@include('store.product.category.parent.manipulate')

@endsection