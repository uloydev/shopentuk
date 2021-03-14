@extends('layouts.template')

@section('body-id', 'dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>All report</h1>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($menuReport as $menu)
                        <li class="list-group-item">
                            <a href="{{ $menu['url'] }}">
                                {{ $menu['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection