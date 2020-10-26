<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
    <link href="{{ asset('template/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/dist/css/style.min.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('partial.preloader')
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('partial.header-admin')
        @include('partial.sidebar-admin')
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center text-muted">
                All Rights Reserved by {{ env('APP_NAME') }}
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/addons/jquery.min.js') }}"></script>
    <script src="{{ asset('js/addons/popper.min.js') }}"></script>
    <script src="{{ asset('js/addons/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/app-style-switcher.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('js/addons/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/sidebarmenu.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('template/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('template/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('template/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('template/dist/js/dashboard1.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
