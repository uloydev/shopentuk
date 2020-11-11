@extends('layouts.template')

@section('body-id', Str::camel($title))

@section('title', ucfirst($title))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="h3">Category and it's sub</h1>
                <button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-primary"
                data-target="#modalAddCategory" data-toggle="modal">
                    Add new category
                </button>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                    @foreach ($categories as $category)
                    <li class="nav-item">
                        <a href="#{{ Str::slug($category->title) }}" data-toggle="tab" 
                        class="nav-link {{ $loop->first ? 'active' : '' }}"
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">{{ Str::words($category->title, 1) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            
                <div class="tab-content">
                    @foreach ($categories as $category)
                    <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ Str::slug($category->title) }}">
                        <ul class="list-group list-group-full list-group-flush">
                            @forelse ($category->productSubCategory as $sub)
                                <li class="list-group-item d-flex align-items-center subcategory"> 
                                    <span class="subcategory__title">
                                        {{ $sub->title }}
                                    </span>
                                    <a href="javascript:void(0);"
                                    class="badge badge-warning badge-pill ml-auto edit-sub-category-btn">
                                        Edit
                                    </a>
                                    <form class="ml-2 d-inline-block" method="POST" title="sub category {{ $sub->id }}"
                                    action="{{ route('admin.all-category.destroy', $sub->id) }}">
                                        @csrf @method('DELETE')
                                        <button class="badge badge-danger badge-pill" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            @empty
                            <li class="list-group-item list-group-item-danger"> 
                                there is no sub on this category
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('store.product.category.create')

@endsection