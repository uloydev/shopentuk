<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ucfirst(Auth::user()->name) }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-html5-1.7.0/datatables.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>

<body id="@yield('body-id')Page">
    @include('partial.preloader')
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('partial.header-admin')
        @include('partial.sidebar-admin')
        <div class="page-wrapper">
            <div class="container-fluid">
                @if (Route::currentRouteName() !== 'superadmin.admin.index')
                @foreach ($errors->all() as $message)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
                @endif
                @if (session('success'))
                    <div class="mb-5">
                        <x-adminmart-alert is-dismissable="true" type="success" message="{{ session('success') }}" />
                    </div>
                @endif
                @yield('content')
            </div>
            <footer class="footer text-center text-muted">
                All Rights Reserved by {{ env('APP_NAME') }}
            </footer>
        </div>
    </div>
    @yield('components')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="{{ asset('js/all-admin.js') }}"></script>
    @stack('scripts')
</body>

</html>
