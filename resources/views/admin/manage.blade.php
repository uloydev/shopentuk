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
                                       {{ Str::limit($account->name, 10) }}
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
                                       <form action="" method="POST"
                                       class="d-inline-block">
                                           @csrf @method('DELETE')
                                           <button type="submit" class="btn btn-sm btn-danger btn-rounded">
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

    @include('admin.add-edit')
    
@endsection