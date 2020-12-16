<div id="modalEditAddress"
class="fixed z-10 inset-0 overflow-y-auto transition duration-200 invisible h-0 opacity-0">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20
        text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">
            ​
        </span>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-headline" 
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden
            shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-3xl">
            <div class="bg-white pt-5 pb-4 p-4 md:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Ubah detail alamat
                </h3>
                <div class="mt-5 flex">
                    <form action="{{ route('my-account.address.update') }}" 
                        method="post" id="editAddressForm"
                        class="grid lg:grid-cols-2 gap-x-5 w-full">
                        <input type="hidden" name="id" id="addressId">
                        @method('PUT')
                        @include('partial.form-field-address')
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <x-btn action="submit" type="primary" form="editAddressForm" text="Submit"
                add-class="w-full lg:w-auto next-step" />
                
                <button type="button" 
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 
                shadow-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none px-4 
                py-2 bg-white text-base focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 
                sm:ml-3 sm:w-auto sm:text-sm focus:ring-2" id="btn-close-modalEditAddress">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>