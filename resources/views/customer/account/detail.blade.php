@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        <form action="{{route('my-account.address.destroy')}}" id="deleteAddressForm" method="post">
            @csrf
            <input type="hidden" name="id">
        </form>
        @if ($errors->any())
            <x-alert type="danger">
                <ul class="list-decimal">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
        @endif
        <div class="bg-white shadow-md p-5 my-10 lg:my-0">
            <x-btn type="secondary"
            add-class="btn-open-close-modal-address justify-center"
            data-url="{{ route('my-account.address.store') }} " text="tambah alamat" />

            <div id="userAddresses" hidden>{!! $userAddresses->toJson() !!}</div>

            @forelse ($userAddresses as $address)
            <div class="flex user-address items-center my-2 bg-gray-100 p-2 rounded-md address" 
            data-userAddressId="{{$address->id}}">
                <p class="w-full">
                    <span class="address__title"></span>
                    {{ $address->title }}
                    @if ($address->is_main_address)
                        <span class="rounded-full bg-blue-500 mx-2 px-2 text-white">
                            alamat utama
                        </span>
                    @endif
                </p>
                <button type="button" class="btn bg-green-600 btn-sm mx-2 btn-edit-address">
                    edit
                </button>
                <button type="button" class="btn bg-red-600 btn-sm mx-2 btn-delete-address">
                    delete
                </button>
            </div>
            @empty
                <p class="mt-4">anda belum punya alamat</p>
            @endforelse
        </div>

        <form action="" method="post" class="mt-5">
            @csrf
            @for ($i = 0; $i < count($labelInput); $i++)
                <x-input-basic label="{{ ucwords($labelInput[$i]) }}" 
                name="{{ Str::snake($labelInput[$i]) }}"
                placeholder="Input Your {{ ucwords($labelInput[$i]) }}" 
                value="{{ $userData[$i] ?? '' }}" disabled/>
            @endfor
            <p class="text-center">
                untuk mengubah data akun silahkan gunakan form
                <a class="text-blue-500" href="{{ route('contact-us.index') }}">contact us</a>
                atau hubungi admin
            </p>
        </form>
    </div>
    @include('partial.modal-edit-address')
    @include('partial.modal-add-address')

@endsection