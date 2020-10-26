<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand">
                <a href="index.html">
                    <b class="logo-icon">
                        <img src="{{ asset('template/assets/images/logo-icon.png') }}" 
                        alt="homepage" class="dark-logo" />
                    </b>
                    <span class="logo-text">Shopentuk</span>
                </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" 
            href="javascript:void(0)" data-toggle="collapse"
            aria-label="Toggle navigation" aria-controls="navbarSupportedContent" 
            aria-expanded="false" data-target="#navbarSupportedContent" >
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                type="search" placeholder="Search" aria-label="Search">
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
                        <img src="{{ asset('template/assets/images/users/profile-pic.jpg') }}" 
                        alt="user" class="rounded-circle" width="40">
                        <span class="ml-2 d-none d-lg-inline-block">
                            <span>Hello,</span> 
                            <span class="text-dark">Jason Doe</span> 
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            My Profile
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="credit-card" class="svg-icon mr-2 ml-1"></i>
                            My Balance
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="mail" class="svg-icon mr-2 ml-1"></i>
                            Inbox
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                            Account Setting
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout
                        </a>
                        <div class="pl-4 p-3">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info">
                                View Profile
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>