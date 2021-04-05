@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="accordion" class="custom-accordion mb-4">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 font-weight-bold">{{ ucwords($title) }}</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.game.custom-game') }}" class="btn btn-info mb-3">Back to list</a>
                        <form action="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end custom accordions-->
        </div>
    </div>
@endsection
