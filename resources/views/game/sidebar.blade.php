<aside class="bg-gray-300 w-full {{ $addClass }}
lg:w-3/12 lg:border-r-2 order-first mt-0">
    <ul class="flex h-100 flex-col">
        <li class="text-lg">
            <a href="javascript:void(0)" class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer cursor-default w-full">
                <span>Jumlah point mu:</span>
                <var class="not-italic font-bold ml-2 sidebar-game__total-point">
                    {{ Auth::user()->point}}
                </var>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer w-full"
            data-micromodal-trigger="modal-rules">
                rules
            </a>
        </li>
        {{-- <li>
            <a class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer justify-between dropdown-toggler w-full">
                <span>next 3 game schedule</span>
                <box-icon name='chevron-right' type='solid'></box-icon>
            </a>
            <ul id="nextGameList" class="dropdown-box pl-5 overflow-hidden transition duration-200 ease-in">
                @foreach ($nextGame as $game)
                <li class="sidebar-game__dropdown-item">
                    <span class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer w-full">
                        <span class="mr-2">Jam:</span>
                        <time>
                            {{ $game->formatted_start_time }}
                        </time>
                    </span>
                </li>
                @endforeach
            </ul>
        </li> --}}
    </ul>
</aside>