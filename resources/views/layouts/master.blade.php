@include('layouts.skeleton-top')
@include('layouts.header')
<main class="@yield('main-class')" @if(Route::currentRouteName() === 'news.index') style="background-image: url('{{ asset("img/special-edition.jpg") }}')" @endif>
    @yield('breadcrumbs')
    @yield('content')
</main>
@include('layouts.skeleton-bottom')