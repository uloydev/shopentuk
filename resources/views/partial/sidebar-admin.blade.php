<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <x-menu-admin icon="dashboard" type="solid" 
                text="dashboard" to="{{ route('admin.dashboard') }}" />
                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">products</span>
                </li>
                <x-menu-admin icon="purchase-tag" type="solid" 
                text="category & sub" to="{{ route('admin.all-category.index') }}"/>
                <x-menu-admin icon="list-ul" text="All product" to="{{ route('admin.products.index') }}"/>
                <li class="nav-small-cap">
                    <span class="hide-menu">others</span>
                </li>
                <x-menu-admin icon="shopping-bag" type="solid" text="order" to="{{ route('admin.order.index') }}"/>
                @if (Auth::user()->role == 'superadmin')
                    <x-menu-admin icon="joystick" class="has-arrow"
                    text="game management" to="{{ route('landing-page') }}">
                        <ul aria-expanded="false" class="collapse first-level base-level-line">
                            @if (auth()->user()->role == 'superadmin')
                            <x-menu-admin icon="customize" type="solid" text="Custom game" to="{{ url('/') }}" />
                            @endif
                            <x-menu-admin icon="history" text="Game history" to="{{ url('/') }}" />
                        </ul>
                    </x-menu-admin>
                @endif

                <x-menu-admin icon="report" type="solid" text="report penjualan" to="{{ route('landing-page') }}"/>
                <x-menu-admin icon="shield-quarter" text="list admin" to="{{ route('superadmin.admins.index') }}"/>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
