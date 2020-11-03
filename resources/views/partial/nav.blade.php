<nav class="nav lg:py-4 lg:shadow-none lg:border-b border-gray-400">
    <div class="container">
        <div class="nav__item nav__item--first lg:border-b-0 lg:pb-0 lg:px-0">
            <a href="{{ route('landing-page') }}" class="nav__logo">
                <picture class="overflow-hidden">
                    <source media="(min-width: 1024px)" srcset="{{ asset('img/logo/shopentuk-desktop.png') }}">
                    <source media="(max-width: 1023px)" srcset="{{ asset('img/logo/shopentuk.png') }}">
                    <img src="{{ asset('img/logo/shopentuk.png') }}">
                </picture>
            </a>
            <a href="" class="nav__icon nav__icon--bag lg:hidden">
                <var class="not-italic" id="total-shopping">0</var>
                <box-icon name='shopping-bag'></box-icon>
            </a>
            <a href="javascript:void(0);" class="nav__icon nav__toggle-menu ml-3">
                <box-icon name='menu-alt-right' id="open-icon"></box-icon>
                <box-icon name='x' id="close-icon"></box-icon>
            </a>
        </div>
        <ul class="nav__ul bg-gray-100 lg:bg-transparent lg:pr-0 lg:pl-8">
            <li class="nav__item nav__item--menu lg:mr-6 lg:flex-grow lg:justify-center">
                <a href="{{ route('landing-page') }}" class="nav__link">Home</a>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child lg:mr-6 lg:flex-grow lg:justify-center">
                <a href="" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="Store" />
                </a>
                <ul class="nav__ul lg:border-0 divide-y lg:divide-gray-300 lg:bg-white pr-0 lg:pr-8 lg:shadow">
                    @foreach ($categories->where('is_digital_product', false) as $category)
                        <li class="nav__item nav__item--menu nav__item-has-child">
                            <a href="" class="nav__link nav__link--open-child">
                                <x-menu-has-child text="{{ Str::words($category->title, 2) }}" />
                            </a>
                            <ul class="nav__ul divide-y divide-gray-400 lg:bg-white">
                                @foreach ($category->productSubCategory as $subCategory)
                                    <x-menu-standar 
                                    id="{{ Str::slug($subCategory->title, '-') }}" 
                                    text="{{ $subCategory->title }}" 
                                    to="/link-go-to" have-icon="true" />
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <x-menu-standar id="menu-store-all" text="All"
                    to="{{ route('store.product.index') }}" have-icon="false" />
                </ul>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child lg:mr-6 lg:flex-grow lg:justify-center">
                <a href="" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="Voucher" />
                </a>
                <ul class="nav__ul lg:bg-white pr-0 lg:pr-4 divide-y lg:divide-gray-400 lg:w-48 lg:shadow">
                    @foreach ($categories->where('is_digital_product', true) as $category)
                        <li class="nav__item nav__item--menu nav__item-has-child">
                            <a href="" class="nav__link nav__link--open-child">
                                <x-menu-has-child text="{{ $category->title }}" />
                            </a>
                            <ul class="nav__ul lg:bg-white divide-y lg:divide-gray-400 border-0 lg:w-48">
                                @foreach ($category->productSubCategory as $subCategory)
                                    <x-menu-standar 
                                    id="{{ Str::slug($subCategory->title, '-') }}" 
                                    text="{{ $subCategory->title }}" 
                                    to="/link-go-pulsa-telkomsel" 
                                    have-icon="true" />
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <x-menu-standar id="menu-store-all" to="{{ route('store.voucher.index') }}" 
                    text="All" have-icon="false"/>
                </ul>
            </li>
            <li class="nav__item nav__item--menu lg:mr-6 lg:flex-grow lg:justify-center">
                <a href="{{ route('payment.show-confirm') }}" class="nav__link">Konfirmasi pembayaran</a>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child lg:mr-6 lg:flex-grow lg:justify-center">
                <a href="" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="Cancel & refund" />
                </a>
                <ul class="nav__ul lg:bg-white divide-y lg:divide-gray-300 lg:shadow">
                    <x-menu-standar id="menu-cancel-refund" text="Pengembalian uang"
                    to="/link-go-to-pengembalian" have-icon="false" />
                    <x-menu-standar id="menu-cancel-pembatalan" text="Pembatalan order"
                    to="/link-go-to-pembatalan" have-icon="false" />
                </ul>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child lg:mr-6 lg:flex-grow lg:justify-center">
                <a href="javascript:void(0);" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="My akun" />
                </a>
                <ul class="nav__ul lg:bg-white divide-y lg:divide-gray-300 lg:shadow">
                    @auth
                        @if (Auth::user()->role == 'user')
                            <x-menu-standar id="menu-my-akun-akun-saya" text="Akun saya" 
                            to="{{ route('home') }}" have-icon="false" />
                        @else
                            <x-menu-standar id="menu-my-akun-akun-saya" text="Dashboard"
                            to="{{ route('admin.dashboard') }}" have-icon="false" />
                        @endif
                    @endauth
                    @guest
                        <x-menu-standar id="menu-my-akun-akun-saya" text="Login"
                        to="{{ route('login') }}" have-icon="false" />
                    @endguest
                    <x-menu-standar id="menu-my-akun-toko-point" text="Toko Point" 
                    to="/link-go-to-toko" have-icon="false" />
                </ul>
            </li>
            <li class="nav__item nav__item--menu hidden lg:inline-flex lg:flex-grow lg:justify-center">
                <a href="" class="nav__icon nav__icon--bag hover:text-white">
                    <var class="not-italic" id="total-shopping">0</var>
                    <box-icon name='shopping-bag'></box-icon>
                </a>
            </li>
        </ul>
    </div>
</nav>