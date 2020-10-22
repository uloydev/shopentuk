<li class="nav__item nav__item--menu" id="{{ $id }}">
    <a href="{{ $to }}" class="nav__link">
        @if ($haveIcon == "true")
            <box-icon name='chevron-right'></box-icon>
        @endif
        <span>{{ $text }}</span>
    </a>
</li>