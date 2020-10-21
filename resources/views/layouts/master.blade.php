<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/native.css') }}">
    <title>Shopentuk Shop | @yield('title')</title>
</head>
<body>
    <header class="header">
        @include('partial.nav')
        @yield('header')
    </header>
    <main>
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>
    @include('partial.footer')
    <script src="{{ asset('js/native.js') }}"></script>
</body>
</html>