@include('layouts.skeleton-top')
@include('layouts.header')
<main class="bg-gray-100 dashboard-customer">
    <div class="container py-10">
        @if (session('error'))
            <x-alert type="error">
                <p>
                    {{ session('error') }}
                </p>
            </x-alert>
        @endif
        @if (session('success'))
            <x-alert type="success">
                {{ session('success') }}
            </x-alert>
        @endif
        @if (session('status'))
            <x-alert type="success">{{ session('status') }}</x-alert>
        @endif
        <div class="mb-5">
            <div class="col-12">
                <figure class="text-center">
                    <img src="{{ asset('img/static/people.png') }}" class="h-48 w-48 rounded-full inline-block"
                        alt="Photo profile of {{ auth()->user()->name }}">
                    <figcaption class="py-3">
                        <p class="mb-3 text-2xl font-bold">{{ auth()->user()->name }}</p>
                        <p class="text-gray-800">
                            <span class="mr-1">Joined at:</span>
                            <time datetime="{{ auth()->user()->created_at }}">
                                {{ auth()->user()->created_at }}
                            </time>
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row items-start relative">
            <ul
                class="mb-5 dashboard-customer__menu-box bg-white shadow-md rounded w-full flex flex-wrap flex-col border border-gray-400 md:w-1/4 md:sticky top-base">
                @foreach ($tabMenus as $tabMenu)
                    <li class="dashboard-customer__menu-item flex-grow capitalize">
                        <a href="{{ route('my-account.' . Str::slug($tabMenu, '.')) }}"
                            class="tab-link text-center block p-4 text-gray-600">
                            {{ $tabMenu }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="mb-6 lg:ml-10 w-full">
                @yield('content')
            </div>
        </div>
    </div>
</main>
@include('layouts.skeleton-bottom')
