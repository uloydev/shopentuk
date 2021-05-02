<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none"
            href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand">
                <a href="{{ route('landing-page') }}">
                    <span class="logo-text">Shopentuk</span>
                </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" 
            href="javascript:void(0)" data-toggle="collapse"
            aria-label="Toggle navigation" aria-controls="navbarSupportedContent" 
            aria-expanded="false" data-target="#navbarSupportedContent">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.setting.index') }}">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input type="search" placeholder="Search" aria-label="Search"
                                class="form-control custom-shadow custom-radius border-0 bg-white">
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>
                        </form>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                    aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        <span class="ml-2 d-none d-lg-inline-block">
                            <span>Hello,</span>
                            <span class="text-dark">{{ Auth::user()->name }}</span> 
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <x-menu-header-admin :to="url('/')" icon="user" text="My Profile"/>
                        <x-menu-header-admin :to="url('/')" icon="credit-card" text="My Balance"/>
                        <x-menu-header-admin :to="route('logout')" icon="power" 
                        text="Logout" id="logoutBtn" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" />
                        <form id="logout-form" action="{{ route('logout') }}"
                        method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>