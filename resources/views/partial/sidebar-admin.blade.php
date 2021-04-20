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
                text="product category" to="{{ route('admin.all-category.index') }}">

                </x-menu-admin>
                <x-menu-admin icon="list-ul" text="All product" 
                to="{{ route('admin.products.index') }}"/>
                <li class="nav-small-cap">
                    <span class="hide-menu">others</span>
                </li>
                <x-menu-admin icon="shopping-bag" class="has-arrow"
                text="order management" to="javascript:void(0);">
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <x-menu-admin icon="shopping-bag" type="solid" text="all order" 
                        to="{{ route('admin.order.index') }}"/>
                        <x-menu-admin icon="shopping-bag" type="solid" text="new order" 
                        to="{{ route('admin.order.new') }}"/>
                        <x-menu-admin icon="shopping-bag" type="solid" text="order to refund" 
                        to="{{ route('refund.manage') }}"/>
                    </ul>
                </x-menu-admin>
                @if (Auth::user()->role == 'superadmin')
                    <x-menu-admin icon="joystick" class="has-arrow"
                    text="game management" to="{{ route('landing-page') }}">
                        <ul aria-expanded="false" class="collapse first-level base-level-line">
                            @if (auth()->user()->role == 'superadmin')
                            <x-menu-admin icon="customize" type="solid" 
                            text="Current Game" to="{{ route('admin.game.current') }}" />
                            <x-menu-admin icon="customize" type="solid" 
                            text="Custom game" to="{{ route('admin.game.custom-game') }}" />
                            @endif
                            <x-menu-admin icon="history" 
                            text="Game history" to="{{ route('admin.game.history') }}" />
                            <x-menu-admin icon="list-ol" 
                            text="Game Rules" to="{{ route('admin.rules.index') }}" />
                        </ul>
                    </x-menu-admin>
                @endif
                <x-menu-admin icon="purchase-tag" 
                text="Discount Voucher" to="{{ route('admin.vouchers.index') }}" />
                <x-menu-admin icon="shield-quarter" text="list admin" 
                to="{{ route('superadmin.admins.index') }}"/>
                <x-menu-admin icon="help-circle" text="Feedback Customer" 
                to="{{ route('admin.contact-us.manage') }}"/>
                <x-menu-admin icon="user-detail" type="solid" 
                to="{{ route('admin.manage-customer') }}" text="List customer" />
                <x-menu-admin icon="news" 
                to="{{ route('admin.news.manage') }}" text="News" />
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
