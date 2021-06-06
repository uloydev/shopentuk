<aside class="bg-gray-300 w-full lg:w-3/12 lg:border-r-2 order-first mt-0 lg:h-full">
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
    </ul>
</aside>