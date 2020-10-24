<nav class="nav sm:py-4">
    <div class="container mx-auto">
        <div class="nav__item nav__item--first sm:border-b-0 sm:pb-0 sm:px-0">
            <a href="{{ route('landing-page') }}" class="nav__logo">
                <picture class="nav__img">
                    <source media="(min-width: 500px)" srcset="{{ asset('img/logo/shopentuk-desktop.png') }}">
                    <source media="(max-width: 499px)" srcset="{{ asset('img/logo/shopentuk.png') }}">
                    <img src="{{ asset('img/logo/shopentuk.png') }}">
                </picture>
            </a>
            <a href="" class="nav__icon nav__icon--bag sm:hidden">
                <var class="not-italic" id="total-shopping">0</var>
                <box-icon name='shopping-bag'></box-icon>
            </a>
            <a href="javascript:void(0);" class="nav__icon nav__toggle-menu ml-3">
                <box-icon name='menu-alt-right' id="open-icon"></box-icon>
                <box-icon name='x' id="close-icon"></box-icon>
            </a>
        </div>
        <ul class="nav__ul bg-gray-100 sm:bg-transparent sm:pr-0 sm:pl-8">
            <li 
            class="nav__item nav__item--menu sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link">Home</a>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="javascript:void(0);"
                class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="Store" />
                </a>
                <ul class="nav__ul sm:border-0 divide-y sm:divide-gray-300 sm:bg-white pr-0 sm:pr-8 sm:shadow">
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <x-menu-has-child text="Pria" />
                        </a>
                        <ul class="nav__ul divide-y divide-gray-400 sm:bg-white sm:shadow">
                            <x-menu-standar id="menu-store-pria-baju" text="Baju" 
                            to="/link-go-to-baju" have-icon="true" />
                            <x-menu-standar id="menu-store-pria-celana" text="Celana" to="/link-go-to-celana"
                            have-icon="true" />
                        </ul>
                    </li>
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <x-menu-has-child text="Wanita" />
                        </a>
                        <ul class="nav__ul divide-y divide-gray-400 sm:bg-white sm:shadow">
                            <x-menu-standar id="menu-store-wanita-baju" text="Baju" to="/link-go-to-baju" 
                            have-icon="true" />
                            <x-menu-standar id="menu-store-wanita-celana" text="Celana" to="/link-go-to-celana"
                            have-icon="true" />
                        </ul>
                    </li>
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <x-menu-has-child text="Accessories" />
                        </a>
                        <ul class="nav__ul divide-y divide-gray-400 sm:bg-white sm:shadow">
                            <x-menu-standar id="menu-accessories-topi" text="Topi" to="/link-go-to-topi" 
                            have-icon="true" />
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="Voucher" />
                </a>
                <ul class="nav__ul sm:bg-white pr-0 sm:pr-4 divide-y sm:divide-gray-400 sm:w-48 sm:shadow">
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <x-menu-has-child text="Pulsa" />
                        </a>
                        <ul class="nav__ul sm:bg-white divide-y sm:divide-gray-400 border-0 sm:w-48 sm:shadow">
                            <x-menu-standar id="menu-pulsa-telkomsel" text="Pulsa Telkomsel" 
                            to="/link-go-pulsa-telkomsel" have-icon="true" />
                            <x-menu-standar id="menu-pulsa-xl" text="Pulsa XL" 
                            to="/link-go-pulsa-xl" have-icon="true" />
                            <x-menu-standar id="menu-pulsa-indosat" text="Pulsa Indosat" 
                            to="/link-go-pulsa-indosat" have-icon="true" />
                            <x-menu-standar id="menu-pulsa-axis" text="Pulsa Axis" 
                            to="/link-go-pulsa-axis" have-icon="true" />
                            <x-menu-standar id="menu-pulsa-tri" text="Pulsa Tri" 
                            to="/link-go-pulsa-tri" have-icon="true" />
                        </ul>
                    </li>
                    <x-menu-standar id="menu-voucher-game" text="Voucher game" 
                    to="/link-go-voucher-game" have-icon="false" />
                </ul>
            </li>
            <li class="nav__item nav__item--menu sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link">Konfirmasi pembayaran</a>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="Cancel & refund" />
                </a>
                <ul class="nav__ul sm:bg-white divide-y sm:divide-gray-300 sm:shadow">
                    <x-menu-standar id="menu-cancel-refund" text="Pengembalian uang"
                    to="/link-go-to-pengembalian" have-icon="false" />
                    <x-menu-standar id="menu-cancel-pembatalan" text="Pembatalan order"
                    to="/link-go-to-pembatalan" have-icon="false" />
                </ul>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link nav__link--open-child">
                    <x-menu-has-nested-child text="My akun" />
                </a>
                <ul class="nav__ul sm:bg-white divide-y sm:divide-gray-300 sm:shadow">
                    <x-menu-standar id="menu-my-akun-akun-saya" text="Akun saya" 
                    to="/link-go-to-akun" have-icon="false" />
                    <x-menu-standar id="menu-my-akun-toko-point" text="Toko Point" 
                    to="/link-go-to-toko" have-icon="false" />
                </ul>
            </li>
            <li class="nav__item nav__item--menu hidden sm:inline-flex sm:flex-grow sm:justify-center">
                <a href="" class="nav__icon nav__icon--bag hover:text-white">
                    <var class="not-italic" id="total-shopping">0</var>
                    <box-icon name='shopping-bag'></box-icon>
                </a>
            </li>
        </ul>
    </div>
</nav>