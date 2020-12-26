<aside class="sidebar-game">
    <ul class="sidebar-game__container">
        <li>
            <a href="{{ route('game.rules') }}" class="sidebar-game__link">rules</a>
        </li>
        <li>
            <a href="{{ route('game.next') }}" class="sidebar-game__link justify-between sidebar-game__link--dropdown">
                <span>next game schedule</span>
                <box-icon name='chevron-right' type='solid' ></box-icon>
            </a>
            <ul class="sidebar-game__dropdown-box">
                @for ($i = 0; $i < 3; $i++)
                <li class="sidebar-game__dropdown-item">
                    <a href="" class="sidebar-game__link">next game {{ $i + 1 }}</a>
                </li>
                @endfor
            </ul>
        </li>
        <li>
            <a href="" class="sidebar-game__link">game history</a>
        </li>
    </ul>
</aside>