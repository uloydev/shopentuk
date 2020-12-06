@extends('layouts.template')

@section('body-id', Str::camel($title))

@section('title', ucfirst($title))

@section('content')

@if (session('msg'))
<div class="mb-5">
    <x-adminmart-alert is-dismissable="true" type="success" message="{{ session('msg') }}" />
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="h3">Primary Category</h1>
                <button type="button" data-target="#modal-add-parent-category" data-toggle="modal"
                class="btn btn-sm waves-effect waves-light btn-rounded btn-primary">
                    Add new category
                </button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($categories as $category)
                    <li class="list-group-item d-flex align-items-center">
                        <span class="mr-auto">{{ Str::words($category->title, 1) }}</span>
                        <a href="javascript:void(0);" data-target="#modalEditPrimaryCategory" 
                        data-toggle="modal"
                        class="badge badge-warning badge-pill ml-auto edit-primary-category-btn">
                            Edit
                        </a>
                        <form class="ml-2 d-inline-block" method="POST" 
                        title="delete primary category {{ $category->id }}"
                        action="{{ route('admin.all-category.parent.destroy', $category->id) }}">
                            @csrf @method('DELETE')
                            <button class="badge badge-danger badge-pill" type="submit">
                                Delete
                            </button>
                        </form>
                    </li>
                    @empty
                    <li class="list-group-item">There's no category right now</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@include('store.product.category.parent.add')

@endsection