@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', ucwords($title))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ ucwords($title) }}
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection