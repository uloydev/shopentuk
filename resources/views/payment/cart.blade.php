@extends('layouts.master')

@section('title', ucfirst($title))

@section('body-id', $title)

@section('content')
<div class="container h-full pt-10 pb-20 px-5 mx-auto">
    @if (isset($cart) && $cart->cartItems->count() > 0)
        <div class="border-b border-gray-400 flex justify-between pb-5 font-bold">
            <h1>Order</h1>
            <p>Price</p>
        </div>
        <div class="grid grid-cols-1 divide-y divide-gray-300">
            @foreach ($cart->cartItems as $item)
                <div class="py-10 cart-item">
                    <figure class="flex flex-wrap items-center">
                        <img src="https://picsum.photos/800" alt="Product on cart" class="h-24 mx-auto">
                        <figcaption class="p-3 flex-grow flex flex-col lg:flex-row lg:justify-between">
                            <div class="mb-5 lg:mb-0">
                                <p class="mb-2">Item {{ $item->product->title }}</p>
                                <p class="text-sm text-gray-700">
                                    {{ $item->product->category->title ?? '' }}
                                </p>
                            </div>
                            <div>
                                @if ($item->is_toko_point)
                                    <var class="cart-item__price not-italic ml-3"
                                    data-price="{{ $item->product->point_price }}" 
                                    data-init-price="{{ $item->product->point_price }}" 
                                    data-is-point="true">
                                        {{ $item->product->point_price * $item->quantity . ' Point' }}
                                    </var>
                                @else
                                    <var class="rupiah-currency cart-item__price not-italic ml-3"
                                    data-price="{{ $item->product->price }}" 
                                    data-init-price="{{ $item->product->price }} " data-is-point="false">
                                        {{ $item->product->price  * $item->quantity}}
                                    </var>
                                @endif
                                <input type="number" name="qty" value="{{ $item->quantity }}" min="1" max="99" 
                                class="cart-item__qty appearance-none text-center h-8 w-8 lg:w-12 bg-white border border-gray-300" data-item-id="{{ $item->id }}" required>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            <ul class="mb-3">
                <li class="py-3 flex justify-between items-center">
                    <span>Sub total : </span>
                    <var class="not-italic font-bold rupiah-currency" id="cart__sub-total">
                        {{ $priceTotal }}
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Shipping: </span>
                    <var class="font-bold rupiah-currency" 
                    id="cart__shipping" data-price="{{ $siteSetting->shipping_price }}">
                    {{ $siteSetting->shipping_price }}
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Point total: </span>
                    <var class="not-italic font-bold" id="cart__total-point">
                        {{ $pointTotal }}
                    </var>
                </li>
                <li class="py-3 flex justify-between items-center">
                    <span>Price Total: </span>
                    <var class="font-bold rupiah-currency" id="cart__total-money">
                        {{ $priceTotal + $siteSetting->shipping_price }}
                    </var>
                </li>
            </ul>
        </div>
        <div class="flex justify-center items-center flex-col lg:flex-row">
            <div class="lg:mr-auto flex items-center text-xs justify-between w-full mb-3 lg:mb-0">
                <a href="{{ url()->previous() }}" id="test"
                class="btn-outline hpver:bg-blue-600 border-blue-500 text-blue-500">
                    <box-icon name='left-arrow-alt' class="text-blue-500"></box-icon>
                    Kembali
                </a>
                <x-btn-primary type="button" text="Perbarui keranjang" id="updateCartBtn"
                class="border-gray-500 hover:border-gray-900 flex items-center lg:mr-3">
                    <box-icon name='refresh' class="mr-1" animation="tada-hover"></box-icon>
                </x-btn-primary>
            </div>
            <x-btn-primary text="Lanjutkan checkout" id="btnShowCheckoutStep"
            class="btn bg-teal-500 active:bg-teal-800 hover:bg-teal-600 border-teal-700
            w-full justify-center"/>
        </div>

        <div id="modal"
        class="fixed z-10 inset-0 overflow-y-auto transition duration-200 invisible h-0 opacity-0">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">
                &#8203;
            </span>
            <div role="dialog" aria-modal="true" aria-labelledby="modal-headline"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Let's checkout
                        </h3>
                        <div class="mt-5 flex w-full-2x step-form">
                            <form action="{{-- routing on js --}}" method="POST" 
                            class="block w-full show-step">
                                <label class="block mb-3">
                                    <span class="text-gray-700">Please fill your address</span>
                                </label>
                                <textarea class="form-textarea mt-1 block w-full" 
                                placeholder="Ex: Swadaya gudang baru, no 16 A, Ciganjur, Jagakarsa, Jakarta Selatan" rows="3"></textarea>
                            </form>
                            <div class="w-full hide-step">
                                <p>Summary order</p>
                                <ul>
                                    @for ($i = 0; $i < 3; $i++)
                                        <li>item {{ $i }}</li>    
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" 
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm
                    px-4 py-2 bg-teal-400 text-base font-medium text-white hover:bg-teal-500
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3
                    sm:w-auto sm:text-sm next-step" disabled>
                        Next
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700
                    hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                    sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="closeModal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    @else
        @include('payment.no-item')
    @endif
</div>

<script>
    const cartPage = document.querySelector('#cartPage')

    const updateCartBtn = cartPage.querySelector('#updateCartBtn');
    updateCartBtn.addEventListener('click', () => {
        let data = [];
        const cartItems = cartPage.querySelectorAll('.cart-item__qty');
        cartItems.forEach(item => {
            data.push({
                'item_id' : item.dataset.itemId,
                'quantity' : item.value,
            });
        });
        fetch('/cart/{{ Auth::user()->cart->id ?? "" }}', {
            method:'PUT',
            headers:{
                'Content-type': 'application/json',
                'X-CSRF-Token': '{{csrf_token()}}',
            },
            body:JSON.stringify(data),
        }).then(res => res.json())
        .then(json => {
            console.log(json);
            location.reload();
        });
    });

</script>

@endsection