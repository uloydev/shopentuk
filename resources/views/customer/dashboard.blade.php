@include('layouts.skeleton-top')
@include('layouts.header')
<main class="bg-gray-100">
    <div class="container py-10">
        <div class="mb-5">
            <div class="col-12">
                <figure class="text-center">
                    <img src="{{ asset('img/static/people.png') }}"
                    class="h-48 w-48 rounded-full inline-block"
                    alt="Photo profile of {{ Auth::user()->name }}">
                    <figcaption class="py-3">
                        <p class="mb-3 text-2xl font-bold">{{ Auth::user()->name }}</p>
                        <p class="text-gray-800">
                            <span class="mr-1">Joined at:</span>
                            <time datetime="{{ Auth::user()->created_at }}">
                                {{ Auth::user()->created_at }}
                            </time>
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
    
        <div class="flex-flex-wrap" id="tabs-id">
            <div class="w-full">
                <ul class="flex flex-wrap bg-white shadow-md mb-5 rounded">
                    @for ($i = 0; $i < 4; $i++)
                        <li class="flex-grow capitalize">
                            <a href="{{ route('my-account.' . Str::slug($tabMenus[$i], '.')) }}"
                            class="change-menu-btn text-center block py-2 px-4 text-gray-600">
                                {{ $tabMenus[$i] }}
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
                    <div class="py-5 flex-auto">
                        <div class="tab-content tab-space">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.skeleton-bottom')