@php
    $colors = [
        'bg-red-500', 'bg-green-500', 'bg-purple-500'
    ];
@endphp

@foreach ($colors as $color)
<div class="section-game__item flex items-center justify-center transition-all duration-200 ease-in flex-col relative text-white p-4 {{ $color }}">
    <label class="section-game__slide-number text-3xl cursor-pointer capitalize" 
    for="{{ $color }}">
        {{ explode("-", $color)[1] }}
    </label>
    <p class="section-game__paragraph capitalize">
        pilih warna ini
    </p>
    <input type="checkbox" name="choose_option" id="{{ $color }}">
    <div class="section-game__item--checked">
        <form action="" class="w-full flex items-center justify-center" method="POST">
            <label for="input-point{{ $loop->iteration }}" 
            class="capitalize mr-2">
                input point
            </label>
            <div class="flex">
                <input type="number" name="point" 
                id="input-point{{ $loop->iteration }}" 
                class="section-game__input bg-white border-transparent text-center p-2 rounded text-gray-900" max="100" min="1"
                data-game-option-id="{{ $loop->iteration }}" required>
                <x-btn action="submit" type="transparent" 
                add-class="btn--without-hover section-game__btn-submit">
                    <box-icon type='solid' name='send' 
                    class="text-white"></box-icon>
                </x-btn>
            </div>
        </form>
        <x-btn type="transparent" text="" 
        add-class="absolute top-0 right-0 section-game__uncheck">
            <box-icon name='x' class="text-white"></box-icon>
        </x-btn>
    </div>
    <div class="thanks-box">
        <p>
            you're inputing
            <span class="font-bold">
                <var class="point-submitted not-italic"></var>
                <span class="uppercase">pts</span>
            </span>
        </p>
        <p>good luck with your gambling!</p>
    </div>
</div>
@endforeach
