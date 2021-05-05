@include('layouts.skeleton-top')
@include('layouts.header')
<main class="@yield('main-class')" @if (Route::currentRouteName() === 'news.index') style="background-image: url('{{ asset('img/special-edition.jpg') }}')" @endif>
    @yield('breadcrumbs')
    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif
    @yield('content')
</main>
@include('layouts.skeleton-bottom')
