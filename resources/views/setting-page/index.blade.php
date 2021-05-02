@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')

@if (session('success'))
<x-adminmart-alert is-dismissable="false" add-class="mb-5"
message="{{ session('success') }}" type="success"/>
    
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="h3 text-capitalize">Site setting</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.update', 1) }}" method="POST">
                    @csrf @method('PUT')
                    <x-input-template name="title" id="title" label="Site Title" placeholder="Title Web" :is-required="true" value="{{ $setting->title }}" />

                    <x-input-template name="shipping_price" id="shipping_price" label="Shipping Price" placeholder="Shipping Price" :is-required="true" 
                    value="{{ $setting->shipping_price }}" />

                    <x-input-template name="non_java_shipping_price" id="non_java_shipping_price" label="Non Java Shipping Price" placeholder="Non Java Shipping Price" :is-required="true" 
                    value="{{ $setting->non_java_shipping_price }}" />

                    <x-input-template name="point_value" id="point_value" label="Point Value" placeholder="Point Value" :is-required="true" 
                    value="{{ $setting->point_value }}" />
                        
                    <div class="form-group">
                        <label for="desc-site">Description</label>
                        <textarea class="form-control" id="desc-site" rows="5" name="description"
                        placeholder="Site description" maxlength="100" required>{{ $setting->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Site Setting</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('components')
<div class="modal" tabindex="-1" role="dialog" id="modal-edit-setting">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setting web</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" id="confirmDeleteBtn">DELETE</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>
@endsection
