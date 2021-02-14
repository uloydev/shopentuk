<aside class="bg-gray-300 w-full 
lg:w-3/12 lg:border-r-2 order-last lg:order-first mt-10 lg:mt-0">
    <ul class="flex h-full lg:flex-col">
        <li class="text-lg">
            <a href="javascript:void(0)" class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer cursor-default">
                <span>Jumlah point mu:</span>
                <var class="not-italic font-bold ml-2 sidebar-game__total-point">
                    {{ Auth::user()->point . 'PTS' }}
                </var>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer"
            data-micromodal-trigger="modal-rules">
                rules
            </a>
        </li>
        <li>
            <a class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer justify-between dropdown-toggler">
                <span>next 3 game schedule</span>
                <box-icon name='chevron-right' type='solid'></box-icon>
            </a>
            <ul class="dropdown-box pl-5 overflow-hidden transition duration-200 ease-in">
                @foreach ($nextGame as $game)
                <li class="sidebar-game__dropdown-item">
                    <a href="javascript:void(0);" class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer">
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