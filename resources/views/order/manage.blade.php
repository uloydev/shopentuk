@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
<h1 class="mb-3">{{ ucwords($title) }}</h1>
<div class="row">
    
</div>
@endsection