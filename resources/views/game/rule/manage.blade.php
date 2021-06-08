@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert--danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-3 d-flex flex-column 
                flex-lg-row justify-content-between">
                    <span class="h3 mb-3 mb-lg-0 d-block d-lg-inline">All Game Rules</span>
                    <button class="btn btn-primary rounded-pill d-flex d-lg-inline-flex align-items-center justify-content-center col-12 col-md-auto" data-toggle="modal"
                    data-target="#modal-add-rule"><box-icon name='plus-square' type='solid' animation='tada' color='#ffffff' ></box-icon> Add Rule</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'no',
                                    'content',
                                    'action'
                                ]
                            ])
                            <tbody>
                                @foreach ($rules as $rule)
                                    <tr class="rule-item">
                                        <td class="rule-item__number" 
                                        data-original="{{ $loop->iteration }}">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="rule-item__content" 
                                        data-original="{{ $rule->content }}">
                                            {{$rule->content}}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning btn-rounded mr-2"
                                            data-toggle="modal"
                                            data-target="#modal-edit-rule"
                                            data-rule-content="{{ $rule->content }}"
                                        data-update-url="{{ route('admin.rules.store', $rule->id) }}">
                                                Edit
                                            </a>
                                            <form method="POST" class="d-inline-block"
                                            action="{{ route('admin.rules.destroy', $rule->id) }}">
                                                @csrf @method('DELETE')
                                                <button type="submit" 
                                                class="btn btn-sm btn-danger btn-rounded">
                                                    Delete
                                                </button>
                                            </form>
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
    @include('game.rule.edit')
    @include('game.rule.create')
@endsection