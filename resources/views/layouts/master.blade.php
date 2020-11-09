@include('layouts.skeleton-top')
@include('layouts.header')
<main class="bg-gray-100">
    @yield('breadcrumbs')
    @yield('content')
</main>
@include('layouts.skeleton-bottom')