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
                    <form action="{{ $formUrl }}" 
                        method="post" id="newAddressForm"
                        class="grid lg:grid-cols-2 gap-x-5 w-full">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
                        @include('partial.form-field-address')
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row lg:justify-end lg:space-x-5">
                <x-btn text="cancel" type="third" 
                add-class="w-full lg:w-auto toggle-popup"
                id="btn-close-modalAddAddress"
                data-modal-id="#modalAddAddress" />
                <x-btn action="submit" type="primary" text="Submit" id="newAddressSubmit" 
                add-class="w-full lg:w-auto" form="newAddressForm" />
            </div>
        </div>
    </div>
</div>