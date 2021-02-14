@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="mb-3">
                        <h1 class="h3">Feedback customer</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'name',
                                    'telephone',
                                    'email',
                                    'message'
                                ]
                            ])
                            <tbody>
                                @foreach ($feedbackCustomer as $feedback)
                                    <tr>
                                        <td>{{ $feedback->name }}</td>
                                        <td>{{ $feedback->telephone }}</td>
                                        <td>{{ $feedback->email }}</td>
                                        <td>
                                            <button type="button" 
                                            data-toggle="modal"
                                            data-target="#modal-feedback" 
                                            data-email="{{ $feedback->email }}"
                                            data-phone="{{ $feedback->telephone }}"
                                            data-message="{{ $feedback->message }}"
                                            class="btn waves-effect waves-light btn-primary">
                                                View Message
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('components')
    @include('feedback.message')
@endsection