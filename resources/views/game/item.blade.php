<div
    class="section-game__item flex items-center justify-center transition-all duration-200 ease-in flex-col relative text-gray-800 p-4 bg-gray-300">
    <label class="section-game__slide-number cursor-pointer w-full h-full" for="option-{{ $option->id }}">
        <div class="text-center text-3xl">
            {{ $option->number }}
        </div>
        <p class="section-game__paragraph capitalize text-center">
            pilih nomor ini
        </p>
        <input type="checkbox" name="choose_option" id="option-{{ $option->id }}">
        <div class="section-game__item--checked">
            <form action="" method="POST">
                <label for="input-point{{ $option->id }}" class="capitalize">
                    input point
                </label>
                <div class="flex">
                    <input type="number" name="point" id="input-point{{ $option->id }}"
                        class="section-game__input bg-white border-transparent text-center p-2 rounded text-gray-900"
                        max="100" min="1" data-game-option-id="{{ $option->id }}" required>
                    <x-btn action="submit" type="transparent" add-class="btn--without-hover section-game__btn-submit">
                        <box-icon type='solid' name='send' class="text-white"></box-icon>
                    </x-btn>
                </div>
            </form>
            <x-btn type="transparent" text="" add-class="absolute top-0 right-0 section-game__uncheck">
                <box-icon name='x' class="text-white"></box-icon>
            </x-btn>
        </div>
    </label>
    <div class="thanks-box">
        <p>
            you're inputing
            <span class="font-bold">
                <var class="point-submitted not-italic"></var>
                <span class="uppercase">pts</span>
            </span>
        </p>
        <p>good luck with your gambling!</p>
        {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full btn-delete-bid px-2 mt-2">
            delete
        </button> --}}
    </div>
</div>
