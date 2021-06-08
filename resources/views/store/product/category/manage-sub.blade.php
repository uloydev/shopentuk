@extends('layouts.template')

@section('body-id', Str::camel($title))

@section('title', ucfirst($title))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-column flex-lg-row align-items-center justify-content-between">
                <h1 class="h3 mb-3 mb-lg-0">Sub category for {{ $category->title }}</h1>
                <button type="button" data-target="#modalAddCategory" data-toggle="modal"
                class="btn btn-sm waves-effect waves-light btn-rounded btn-primary" id="btn-add-sub-category" data-category="{{ $category->title }}">
                    Add new sub category
                </button>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <ul class="list-group list-group-full list-group-flush">
                        @forelse ($category->productSubCategory as $sub)
                            <li class="list-group-item d-flex align-items-center subcategory"> 
                                <span class="subcategory__title" 
                                data-category-parent="{{ $category->title }}">
                                    {{ $sub->title }}
                                </span>
                                <a href="javascript:void(0);" 
                                data-target="#modalEditCategory" data-toggle="modal"
                                class="badge badge-warning badge-pill ml-auto edit-sub-category-btn"
                                data-edit-link="{{ route('admin.all-category.sub.update',[
                                    'cat' => $category->id, 
                                    'sub' => $sub->id
                                ]) }}">
                                    Edit
                                </a>
                                <form class="ml-2 d-inline-block" method="POST" 
                                title="sub category {{ $sub->id }}"
                                action="{{ route('admin.all-category.sub.destroy',[
                                    'cat' => $category->id, 
                                    'sub' => $sub->id
                                    ]) }}">
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
            </div>
        </div>
    </div>
</div>

@include('store.product.category.manipulate')

@endsection