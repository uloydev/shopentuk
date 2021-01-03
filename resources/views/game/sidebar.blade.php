<aside class="sidebar-game">
    <ul class="sidebar-game__container">
        <li class="sidebar-game__menu text-lg">
            <a href="javascript:void(0)" class="sidebar-game__link cursor-default">
                <span>Jumlah point mu:</span>
                <var class="not-italic font-bold ml-2">{{ Auth::user()->point . 'PTS' }}</var>
            </a>
        </li>
        <li class="sidebar-game__menu">
            <a href="javascript:void(0)" class="sidebar-game__link"
            data-micromodal-trigger="modal-rules">
                rules
            </a>
        </li>
        <li class="sidebar-game__menu">
            <a class="sidebar-game__link justify-between sidebar-game__link--dropdown">
                <span>next 3 game schedule</span>
                <box-icon name='chevron-right' type='solid'></box-icon>
            </a>
            <ul class="sidebar-game__dropdown-box">
                @foreach ($nextGame as $game)
                <li class="sidebar-game__dropdown-item">
                    <a href="javascript:void(0);" class="sidebar-game__link">
                        @php
                            $startAtDate = $game->started_at->format("d M Y");
                            $startAtTime = $game->started_at->format("H:i");
                            $startAt = $startAtDate . ' jam ' . $startAtTime;
                        @endphp
                        <span class="mr-2">Jam:</span>
                        <time datetime="{{ $startAtDate . ' '. $startAtTime }}">
                            {{ $startAt }}
                        </time>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
</aside>