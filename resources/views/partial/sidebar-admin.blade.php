<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <x-menu-admin icon="home" text="dashboard" :to="route('admin.dashboard')" />
                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Products</span>
                </li>
                <x-menu-admin icon="tag" text="Category & sub" :to="route('admin.all-category.index')"/>
                <x-menu-admin icon="message-square" text="All product" :to="route('admin.products.index')"/>
                <li class="nav-small-cap">
                    <span class="hide-menu">Others</span>
                </li>
                <x-menu-admin icon="message-square" text="Order" :to="route('landing-page')"/>
                <x-menu-admin icon="message-square" text="game history" :to="route('landing-page')"/>
                <x-menu-admin icon="message-square" text="report penjualan" :to="route('landing-page')"/>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
