@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header mb-3 d-flex flex-column 
                    flex-lg-row justify-content-between">
                    <span class="h3 mb-3 mb-lg-0 d-block d-lg-inline">Change Password</span>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.change-password') }}" method="post">
                        @csrf
                        <x-input-template name="password" type="password" label="New Password" required></x-input-template>
                        <x-input-template name="password_confirmation" type="password" label="Confirm New Password" required></x-input-template>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
