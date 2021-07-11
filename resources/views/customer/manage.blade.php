@extends('layouts.template')

@section('body-id', 'dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Manage customer
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'id',
                                    'name',
                                    'email',
                                    'telephone',
                                    'join at',
                                    'action'
                                ]
                            ])
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->created_at }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-edit-user"
                                            data-toggle="modal" data-target="#modalEditUser"
                                            data-user-email="{{ $customer->email }}"
                                            data-user-phone="{{ $customer->phone }}"
                                            data-user-pemilik-rekening="{{ $customer->pemilik_rekening }}"
                                            data-user-bank="{{ $customer->bank }}"
                                            data-user-rekening="{{ $customer->rekening }}"
                                            data-update-url="{{ route('admin.manage-customer.update', $customer->id) }}"
                                            >edit</button>

                                            <button class="btn btn-danger btn-change-password"
                                            data-toggle="modal" data-target="#modalChangePasswordUser"
                                            data-update-url="{{ route('admin.manage-customer.update-password', $customer->id) }}"
                                            data-user-email="{{ $customer->email }}"
                                            >change password</button>
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
    @include('customer.edit')
    @include('customer.change-password')
@endsection