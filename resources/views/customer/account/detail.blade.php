@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="block">
        <form action="{{route('my-account.address.destroy')}}" id="deleteAddressForm" method="post">
            @csrf
            <input type="hidden" name="id">
        </form>

        <div class="bg-white shadow-md p-5 my-10">
            <button type="button" class="btn bg-green-600 btn-sm m-2 btn-modal-address capitalize">
                tambah alamat
            </button>
            @forelse ($userAddresses as $address)
            <div class="flex user-address my-2 bg-gray-100 p-2 rounded-md address" 
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

        <form action="{{ route('my-account.update') }}" method="post">
            @csrf
            @for ($i = 0; $i < count($labelInput); $i++)
                <x-input-basic label="{{ ucwords($labelInput[$i]) }}" name="{{ Str::snake($labelInput[$i]) }}"
                placeholder="Input Your {{ ucwords($labelInput[$i]) }}" value="{{ $userData[$i] ?? '' }}" required />
            @endfor
            <x-btn-primary text="Save changes" class="w-full md:w-auto text-white rounded 
            bg-teal-500 hover:bg-teal-600 focus:bg-teal-700
            border-b-4 border-red-900 border-opacity-25 transform focus:translate-y-1" />
        </form>

        
    </div>
    @include('customer.account.edit-address')
    @include('customer.account.add-address')
@endsection
@push('script')
    <script>
        function openCloseModal (modalSelector) {
            const modalEl = document.querySelector(modalSelector)
            const classToCloseModal = ['invisible', 'h-0', 'opacity-0']

            // if modal open, set isModalOpen = true. else, isModalOpen = false
            const isModalOpen = modalEl.classList.contains(...classToCloseModal) ? true : false
            
            if (isModalOpen === true) {
                // close modal
                modalEl.classList.remove(...classToCloseModal)
            }
            else {
                // open modal
                modalEl.classList.add(...classToCloseModal)
            }
        }
        const userAddresses = JSON.parse('{!!  $userAddresses->toJson() !!}');
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
                deleteAddressForm.querySelector('input[name="id"]').value = btn.parentElement.dataset.useraddressid
                deleteAddressForm.submit()
            })
        })

        closeEditModalBtn.addEventListener('click', () => {
            openCloseModal('#modalEditAddress')
        })

    </script>
@endpush
