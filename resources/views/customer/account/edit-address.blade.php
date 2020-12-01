<div id="modalEditAddress" class="fixed z-10 inset-0 overflow-y-auto transition duration-200" modal-closed>
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
                    Tambah alamat baru
                </h3>
                <div class="mt-5 flex">
                    <form action="{{route('my-account.address.update')}}" method="post" id="editAddressForm"
                        class="grid lg:grid-cols-2 gap-x-5 w-full">
                        @csrf
                        <input type="number" name="id" id="addressId" hidden>
                        <div class="mb-6 ">
                            <label for="title" class="block mb-2 required-input">
                                <span class="text-gray-700">Title</span>
                            </label>
                            <input type="text" id="title" name="title"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 ">
                            <label for="name" class="block mb-2 required-input">
                                <span class="text-gray-700">Name</span>
                            </label>
                            <input type="text" id="name" name="name"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 ">
                            <label for="email" class="block mb-2 required-input">
                                <span class="text-gray-700">Email</span>
                            </label>
                            <input type="text" id="email" name="email"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 ">
                            <label for="phone" class="block mb-2 required-input">
                                <span class="text-gray-700">Phone</span>
                            </label>
                            <input type="text" id="phone" name="phone"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 lg:col-span-full">
                            <label class="block required-input" for="street_address">
                                <span class="text-gray-700">
                                    Street Address
                                </span>
                            </label>
                            <textarea id="street_address" class="form-textarea mt-1 block w-full" rows="3"
                                placeholder="Masukan nama jalanmu" name="street_address" required>
                                        </textarea>
                        </div>
                        <div class="mb-6 ">
                            <label for="kelurahan" class="block mb-2 required-input">
                                <span class="text-gray-700">Kelurahan</span>
                            </label>
                            <input type="text" id="kelurahan" name="kelurahan"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 ">
                            <label for="kecamatan" class="block mb-2 required-input">
                                <span class="text-gray-700">Kecamatan</span>
                            </label>
                            <input type="text" id="kecamatan" name="kecamatan"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 ">
                            <label for="city" class="block mb-2 required-input">
                                <span class="text-gray-700">City</span>
                            </label>
                            <input type="text" id="city" name="city"
                                class="form-input mt-1 block w-full   border-gray-400 " 
                                required>

                        </div>
                        <div class="mb-6 ">
                            <label for="province" class="block mb-2 required-input">
                                <span class="text-gray-700">Province</span>
                            </label>
                            <input type="text" id="province" name="province"
                                class="form-input mt-1 block w-full   border-gray-400 "
                                required>

                        </div>
                        <div class="mb-6 lg:col-span-full">
                            <label for="postal_code" class="block mb-2 required-input">
                                <span class="text-gray-700">Postal Code</span>
                            </label>
                            <input type="text" id="postal_code" name="postal_code"
                                class="form-input mt-1 block w-full border-gray-400 " 
                                required>

                        </div>
                        <div class="block mb-6 lg:col-span-full">
                            <label for="" class="required-input">
                                <span class="text-gray-700">
                                    Jadikan sebagai alamat utama ?
                                </span>
                            </label>
                            <div class="mt-2 flex">
                                <div class="mr-5">
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio" name="is_main_address"
                                            value="1" id="main1">
                                        <span>
                                            ya
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-2">
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio" name="is_main_address" value="0" id="main0">
                                        <span>
                                            tidak
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" form="newAddressForm" 
                class="w-full inline-flex justify-center rounded-md border border-transparent
                shadow-sm px-4 py-2 bg-teal-400 text-base font-medium text-white
                hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm next-step">
                    Submit
                </button>
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