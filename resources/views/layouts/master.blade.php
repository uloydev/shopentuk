<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/native.css') }}">
    <title>Shopentuk Shop | @yield('title')</title>
    @stack('css')
</head>
<body id="@yield('body-id')Page" class="overflow-x-hidden">
    <header class="header bg-gray-100">
        @include('partial.nav')
        @yield('header')
    </header>
    <main class="bg-gray-100">
        @yield('breadcrumbs')
        @yield('content')
    </main>
    @include('partial.footer')
    <script src="{{ mix('js/all-client.js') }}"></script>
    @stack('script')
</body>
</html>