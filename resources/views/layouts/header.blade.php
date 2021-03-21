<header class="header relative z-10 @yield('header-class')" 
style="background-image: url(@yield('header-bg'))">
    @include('partial.nav')
    @yield('header')
</header>