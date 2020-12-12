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
            <button type="button" 
            class="btn bg-green-600 btn-sm m-2 w-full justify-center lg:w-auto lg:justify-start btn-open-close-modal-address capitalize" id="btn-add-address" 
            data-url="{{ route('my-account.address.store') }}">
                tambah alamat
            </button>
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
                <p>anda belum punya alamat</p>
            @endforelse
        </div>

        <form action="{{-- route('my-account.update') --}}" method="post" class="mt-5">
            @csrf
            @for ($i = 0; $i < count($labelInput); $i++)
                <x-input-basic label="{{ ucwords($labelInput[$i]) }}" 
                name="{{ Str::snake($labelInput[$i]) }}"
                placeholder="Input Your {{ ucwords($labelInput[$i]) }}" 
                value="{{ $userData[$i] ?? '' }}" required disabled/>
            @endfor
            <p class="text-center">
                untuk mengubah data akun silahkan gunakan form <a class="text-blue-500" href="{{route('contact-us.index')}}">contact us</a> atau hubungi admin
            </p>
        </form>
    </div>
    @include('customer.account.edit-address')
    @include('partial.modal-add-address', ['formUrl' => route('my-account.address.store-redirect')])

@endsection
@push('script')
    <script>
        function openCloseModal (modalSelector) {
            const modalEl = document.querySelector(modalSelector)
            const classToCloseModal = ['invisible', 'h-0', 'opacity-0']

            // if modal open, set isModalOpen = true. else, isModalOpen = false
            const isModalOpen = modalEl.classList.contains(...classToCloseModal) ? true : false
            
            if (isModalOpen) {
                // close modal
                modalEl.classList.remove(...classToCloseModal)
            }
            else {
                // open modal
                modalEl.classList.add(...classToCloseModal)
            }
        }
        const userAddresses = JSON.parse('{!! $userAddresses->toJson() !!}');
        const editAddressBtn = document.querySelectorAll('.btn-edit-address');
        // const newAddressBtn = document.querySelector('#newAddressBtn');
        const deleteAddressBtn = document.querySelectorAll('.btn-delete-address');
        const editAddressForm = document.querySelector('#editAddressForm');
        const deleteAddressForm = document.querySelector('#deleteAddressForm');
        const closeEditModalBtn = document.querySelector('#btn-close-modalEditAddress')

        editAddressBtn.forEach((btn) => {
            btn.addEventListener('click', () => {
                let address = userAddresses.find((data) => {
                    return btn.parentElement.dataset.useraddressid == data.id
                })
                
                editAddressForm.querySelector('input#addressId').value = address.id
                editAddressForm.querySelector('input#title').value = address.title
                editAddressForm.querySelector('input#name').value = address.name
                editAddressForm.querySelector('input#email').value = address.email
                editAddressForm.querySelector('input#phone').value = address.phone
                editAddressForm.querySelector('input#kelurahan').value = address.kelurahan
                editAddressForm.querySelector('input#kecamatan').value = address.kecamatan
                editAddressForm.querySelector('input#city').value = address.city
                editAddressForm.querySelector('input#province').value = address.province
                editAddressForm.querySelector('input#postal_code').value = address.postal_code
                editAddressForm.querySelector('input#main1').checked = address.is_main_address
                editAddressForm.querySelector('input#main0').checked = !address.is_main_address
                editAddressForm.querySelector('textarea#street_address').value = address.street_address
                let formData = new FormData(editAddressForm)
                console.log(Object.fromEntries(formData))
                // please fix open modal
                openCloseModal('#modalEditAddress')
            })
        })

        deleteAddressBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                deleteAddressForm
                .querySelector('input[name="id"]')
                .value = btn.parentElement.dataset.useraddressid
                
                deleteAddressForm.submit()
            })
        })

        closeEditModalBtn.addEventListener('click', () => {
            openCloseModal('#modalEditAddress')
        })

    </script>
@endpush
