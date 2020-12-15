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

            {{-- <div id="userAddresses" data-address="{!! $userAddresses->toJson() !!}" hidden></div> --}}

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

@push('scripts')
    <script>
        const editAddressBtn = document.querySelectorAll('.btn-edit-address');
            const userAddresses = JSON.parse('{!! $userAddresses->toJson() !!}');
            const editAddressForm = document.querySelector('#editAddressForm');
            
            const setValue = (field, val) => {
                editAddressForm.querySelector(field).value = val
            }
            const setChecked = (field, val) => {
                editAddressForm.querySelector(field).checked = val
            }
    
            editAddressBtn.forEach((btn) => {
                btn.addEventListener('click', () => {
                    let address = userAddresses.find((data) => {
                        return btn.parentElement.dataset.useraddressid == data.id
                    })
                    
                    const addressFieldsWithValue = {
                        'input#addressId': address.id,
                        'input#title': address.title,
                        'input#name': address.name,
                        'input#email': address.email,
                        'input#phone': address.phone,
                        'input#kelurahan': address.kelurahan,
                        'input#kecamatan': address.kecamatan,
                        'input#city': address.city,
                        'input#province': address.province,
                        'input#postal_code': address.postal_code,
                        'textarea#street_address': address.street_address
                    }

                    const addressFieldsIsChecked = {
                        'input#main1': address.is_main_address,
                        'input#main0': !address.is_main_address,
                    }

                    for (const addressField in addressFieldsWithValue) {
                        setValue(addressField, addressFieldsWithValue[addressField])
                    }
                    for (const addressIsChecked in addressFieldsIsChecked) {
                        setChecked(addressIsChecked, addressFieldsIsChecked)
                    }

                    /*
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
                    editAddressForm.querySelector('textarea#street_address').value
                    = address.street_address
                    */
                    let formData = new FormData(editAddressForm)
                    console.log(Object.fromEntries(formData))
                    // please fix open modal
                    HelperModule.openCloseModal('#modalEditAddress')
                })
            })
    </script>
@endpush