<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <x-menu-admin icon="home" text="dashboard" to="{{ route('admin.dashboard') }}" />
                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">products</span>
                </li>
                <x-menu-admin icon="tag" text="category & sub" to="{{ route('admin.all-category.index') }}"/>
                <x-menu-admin icon="message-square" text="All product" to="{{ route('admin.products.index') }}"/>
                <li class="nav-small-cap">
                    <span class="hide-menu">others</span>
                </li>
                <x-menu-admin icon="message-square" text="order" to="'javascript:void(0)'"/>
                <x-menu-admin icon="message-square" class="has-arrow"
                text="game management" to="{{ route('landing-page') }}">
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        @if (auth()->user()->role == 'superadmin')
                        <x-menu-admin icon="message-square" text="Custom game" to="{{ url('/') }}" />
                        @endif
                        <x-menu-admin icon="message-square" text="Game history" to="{{ url('/') }}" />
                    </ul>
                </x-menu-admin>

                <x-menu-admin icon="message-square" text="report penjualan" to="{{ route('landing-page') }}"/>
                <x-menu-admin icon="message-square" text="list admin" to="{{ route('superadmin.admins.index') }}"/>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
