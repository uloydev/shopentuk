<div id="modalAddAddress"
class="fixed z-10 inset-0 overflow-y-auto transition duration-200 invisible h-0 opacity-0">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20
    text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-headline"
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden
        shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-3xl">
            <div class="bg-white pt-5 pb-4 p-4 md:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Tambah alamat baru
                </h3>
                <div class="mt-5 flex">
                    <form action="{{ route('my-account.address.store-redirect') }}" 
                        method="post" id="newAddressForm"
                        class="grid lg:grid-cols-2 gap-x-5 w-full">
                        @include('partial.form-field-address')
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <x-btn action="submit" type="primary" text="Submit" id="newAddressSubmit" form="newAddressForm" />
                {{-- <button type="submit" id="newAddressSubmit" form="newAddressForm"
                class="w-full inline-flex justify-center rounded-md border border-transparent
                shadow-sm px-4 py-2 bg-teal-400 text-base font-medium text-white
                hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Submit
                </button> --}}
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium
                text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto
                sm:text-sm btn-open-close-modal-address" id="btn-close-modalAddAddress">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>