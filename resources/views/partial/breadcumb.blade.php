@php 
    $link = "";
@endphp
<nav class="bg-grey-light py-3 rounded font-sans w-full">
    <ol class="list-reset flex text-grey-dark">
        <li>
            <a href="{{ route('landing-page') }}" class="text-blue font-bold">Beranda</a>
        </li>
        <li>
            <span class="mx-2">/</span>
        </li>
        @for ($i = 1; $i <= count(Request::segments()); $i++)
            @if ($i < count(Request::segments()) & $i > 0)
                @php 
                    $link .= "/" . Request::segment($i); 
                @endphp
                <li>
                    <a href="{{ $link }}" class="text-blue font-bold">
                        {{ ucwords(str_replace('-', ' ', Request::segment($i)) )}}
                    </a>
                </li>
                <li>
                    <span class="mx-2">/</span>
                </li>
            @else 
                <li>{{ ucwords(str_replace('-',' ',Request::segment($i)) )}}</li>
            @endif
        @endfor
    </ol>
</nav>