<div id="modalCheckout"
class="fixed z-10 inset-0 overflow-y-auto transition duration-200 invisible h-0 opacity-0">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">
            &#8203;
        </span>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-headline"
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden
        shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 text-center" id="modal-headline">
                        Let's checkout
                    </h3>
                    <div class="mt-5 flex w-full-2x step-form">
                        <form action="{{ route('store.checkout') }}" method="POST" 
                        class="block w-full show-step" id="form-checkout">
                        @csrf
                        <input type="hidden" name="voucher">
                            <div class="mb-5">
                                <label class="block mt-4">
                                    <span class="text-gray-700">Pilih alamat</span>
                                </label>
                                <select class="form-select mt-1 block w-full mb-1" name="address_id" required>
                                    @forelse ($addresses as $address)
                                        <option value="{{ $address->id }}" data-is-java="{{ $address->is_java }}">
                                            {{ $address->title }}
                                        </option>
                                    @empty
                                        <option selected disabled value="" data-is-java="0">
                                            Kamu belum pernah memasukan data alamatmu
                                        </option>
                                    @endforelse
                                </select>
                                <a href="javascript:void(0)"
                                class="btn-open-close-modal-address text-blue-400 underline">
                                    Tambah alamat
                                </a>
                            </div>
                        </form>
                        <div class="w-full hide-step">
                            <p class="font-bold">Summary order</p>
                            <ul>
                                @foreach ($cart->cartItems as $item)
                                    <li>{{ $item->product->title }} x {{ $item->quantity }}</li>
                                @endforeach
                                <hr class="my-3">
                                <li class="py-1 flex justify-between items-center">
                                    <span>Shipping 
                                        <span class="text-sm font-medium bg-blue-100 py-1 px-2 rounded text-blue-500" id="isJavaAddress">
                                        </span>
                                    </span>
                                    <var class="font-bold" id="cart__shipping"
                                    data-price="{{ $siteSetting->shipping_price }}" 
                                    data-non-java-price="{{ $siteSetting->non_java_shipping_price }}"
                                    data-point-value="{{ $siteSetting->point_value }}">
                                    </var>
                                </li>
                                <li class="py-3 flex justify-between items-center">
                                    <span>Point total</span>
                                    <var class="not-italic font-bold" id="cart__total-point">
                                    </var>
                                </li>
                                <li class="py-3 flex justify-between items-center">
                                    <span>Price Total</span>
                                    <var class="font-bold rupiah-currency" id="cart__total-money">
                                    </var>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="btnNextStep"
                class="w-full inline-flex justify-center rounded-md border border-transparent
                shadow-sm px-4 py-2 bg-teal-400 text-base font-medium text-white
                hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm next-step">
                    Next
                </button>
                <button type="submit" id="btnCheckout" form="form-checkout"
                class="w-full inline-flex justify-center rounded-md border border-transparent
                shadow-sm px-4 py-2 bg-teal-400 text-base font-medium text-white
                hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm next-step hidden">
                    Checkout
                </button>
                <button type="button" 
                class="mt-3 w-full inline-flex justify-center rounded-md font-medium
                border border-gray-300 shadow-sm px-4 py-2 bg-white text-base
                text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 sm:text-sm
                focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto"
                id="closeModalCheckout">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>