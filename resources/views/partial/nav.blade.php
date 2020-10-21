<nav class="nav sm:py-4">
    <div class="container mx-auto">
        <div class="nav__item nav__item--first sm:border-b-0 sm:pb-0 sm:px-0">
            <a href="{{ route('landing-page') }}" class="nav__logo">
                <picture class="nav__img" >
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
            <li class="nav__item nav__item--menu sm:mr-6 sm:text-gray-300 sm:hover:text-white sm:flex-grow sm:justify-center">
                <a href="" class="nav__link">Home</a>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="javascript:void(0);" class="nav__link nav__link--open-child sm:text-gray-300 sm:hover:text-white">
                    <span>Store</span>
                    <box-icon name='chevron-down' type='solid' color="#718096" 
                    class="child-dropdown-icon ml-auto sm:ml-2"></box-icon>
                </a>
                <ul class="nav__ul sm:border-0 divide-y sm:divide-gray-300 sm:bg-white">
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <box-icon name='chevron-right'></box-icon>
                            <span>Pria</span>
                            <box-icon name='chevron-down' type='solid' 
                            color="#718096" class="child-dropdown-icon ml-auto sm:hidden"></box-icon>
                        </a>
                        <ul class="nav__ul divide-y divide-gray-400 sm:bg-white">
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">
                                    <box-icon name='chevron-right'></box-icon>
                                    <span>Baju</span>
                                </a>
                            </li>
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">
                                    <box-icon name='chevron-right'></box-icon>
                                    <span>Celana</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <box-icon name='chevron-right'></box-icon>
                            <span>Wanita</span>
                            <box-icon name='chevron-down' type='solid' 
                            color="#718096" class="child-dropdown-icon ml-auto sm:hidden"></box-icon>
                        </a>
                        <ul class="nav__ul divide-y divide-gray-400 sm:bg-white">
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">
                                    <box-icon name='chevron-right'></box-icon>
                                    <span>Baju</span>
                                </a>
                            </li>
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">
                                    <box-icon name='chevron-right'></box-icon>
                                    <span>Celana</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <box-icon name='chevron-right'></box-icon>
                            <span>Accessories</span>
                            <box-icon name='chevron-down' type='solid'
                            color="#718096" class="child-dropdown-icon ml-auto sm:hidden"></box-icon>
                        </a>
                        <ul class="nav__ul divide-y divide-gray-400 sm:bg-white">
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">
                                    <box-icon name='chevron-right'></box-icon>
                                    <span>Topi</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link nav__link--open-child sm:text-gray-300 sm:hover:text-white">
                    <span>Voucher</span>
                    <box-icon name='chevron-down' type='solid' color="#718096" 
                    class="child-dropdown-icon ml-auto sm:ml-2"></box-icon>
                </a>
                <ul class="nav__ul sm:bg-white pr-0 sm:pr-4 divide-y sm:divide-gray-400 sm:w-48">
                    <li class="nav__item nav__item--menu nav__item-has-child">
                        <a href="" class="nav__link nav__link--open-child">
                            <box-icon name='chevron-right' class="hidden sm:block sm:order-1"></box-icon>
                            <span>Pulsa</span>
                            <box-icon name='chevron-down' type='solid' color="#718096" 
                            class="child-dropdown-icon ml-auto sm:hidden"></box-icon>
                        </a>
                        <ul class="nav__ul sm:bg-white divide-y sm:divide-gray-400 border-0 sm:w-48">
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">Pulsa Telkomsel</a>
                            </li>
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">Pulsa XL</a>
                            </li>
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">Pulsa Indosat</a>
                            </li>
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">Pulsa Axis</a>
                            </li>
                            <li class="nav__item nav__item--menu">
                                <a href="" class="nav__link">Pulsa Tri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__item nav__item--menu">
                        <a href="" class="nav__link">Voucher game</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="nav__item nav__item--menu sm:mr-6 sm:text-gray-300 sm:hover:text-white sm:flex-grow sm:justify-center">
                <a href="" class="nav__link">Konfirmasi pembayaran</a>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link nav__link--open-child sm:text-gray-300 sm:hover:text-white">
                    <span>Cancel & refund</span>
                    <box-icon name='chevron-down' type='solid' color="#718096" 
                    class="child-dropdown-icon ml-auto sm:ml-2"></box-icon>
                </a>
                <ul class="nav__ul sm:bg-white divide-y sm:divide-gray-300">
                    <li class="nav__item nav__item--menu">
                        <a href="" class="nav__link">
                            <box-icon name='chevron-right'></box-icon>
                            Pengembalian uang
                        </a>
                    </li>
                    <li class="nav__item nav__item--menu">
                        <a href="" class="nav__link">
                            <box-icon name='chevron-right'></box-icon>
                            Pembatalan order
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav__item nav__item--menu nav__item-has-child sm:mr-6 sm:flex-grow sm:justify-center">
                <a href="" class="nav__link nav__link--open-child sm:text-gray-300 sm:hover:text-white">
                    <span>My akun</span>
                    <box-icon name='chevron-down' type='solid' color="#718096" 
                    class="child-dropdown-icon ml-auto sm:ml-2"></box-icon>
                </a>
                <ul class="nav__ul sm:bg-white divide-y sm:divide-gray-300">
                    <li class="nav__item nav__item--menu">
                        <a href="" class="nav__link">
                            <box-icon name='chevron-right'></box-icon>
                            <span>Akun saya</span>
                        </a>
                    </li>
                    <li class="nav__item nav__item--menu">
                        <a href="" class="nav__link">
                            <box-icon name='chevron-right'></box-icon>
                            <span>Toko point</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav__item nav__item--menu hidden sm:inline-flex sm:flex-grow sm:justify-center">
                <a href="" class="nav__icon nav__icon--bag">
                    <var class="not-italic" id="total-shopping">0</var>
                    <box-icon name='shopping-bag'></box-icon>
                </a>
            </li>
        </ul>
    </div>
</nav>