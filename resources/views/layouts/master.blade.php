@include('layouts.skeleton-top')
@include('layouts.header')
<main class="@yield('main-class')">
    @yield('breadcrumbs')
    @yield('content')
</main>
@include('layouts.skeleton-bottom')