@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h1 class="h3 text-capitalize">{{ $title }}</h1>
                    <button type="button" data-toggle="modal" data-target="#addNewAdmin"
                        class="btn btn-sm btn-primary btn-rounded mr-2">
                        Add new admin
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered no-wrap" id="zero_config">
                        @include('partial.thead', [
                        'thead' => [
                        'name',
                        'email',
                        'phone',
                        'joined at',
                        'action'
                        ]
                        ])
                        <tbody>
                            @foreach ($admins as $account)
                                <tr class="admin">
                                    <td class="admin__name" data-admin-name="{{ $account->name }}">
                                        {{ $account->name }}
                                    </td>
                                    <td class="admin__email">
                                        {{ $account->email }}
                                    </td>
                                    <td class="admin__phone">
                                        {{ $account->phone }}
                                    </td>
                                    <td class="admin__joined-at">
                                        {{ $account->created_at }}
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#editAdmin"
                                            class="btn btn-sm btn-warning btn-rounded mr-2 btn-edit-admin"
                                            data-admin-id="{{ $account->id }}">
                                            Edit
                                        </button>
                                        <form id="formDelete{{ $account->id }}" action="{{ route('superadmin.admins.destroy', $account->id) }}" method="POST" class="d-inline-block">
                                            @csrf @method('DELETE')
                                        </form>
                                        <button class="btn btn-sm btn-danger btn-rounded btn-delete-admin" data-admin-id='{{ $account->id }}'>
                                            Delete
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

    @include('admin.add-edit')
    <div class="modal" tabindex="-1" role="dialog" id="modalConfirmDelete" data-admin-id="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apa Anda yakin ingin menghapus akun admin ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="confirmDeleteBtn">DELETE</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
@endsection
