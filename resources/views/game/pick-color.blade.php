@foreach ($options->where('type', 'color') as $color)
    <div class="box-item flex items-center justify-center transition-all duration-200 ease-in flex-col relative text-white p-4 {{ $color->html_class }}">
        <label class="game-checkbox-label section-game__slide-number cursor-pointer w-full h-full" for="input-color-{{ $color->id }}">
            <div class="text-center text-3xl capitalize">
                {{ $color->color }}
            </div>
            <p class="section-game__paragraph text-center capitalize">
                pilih warna ini
            </p>
            <input type="checkbox" name="choose_option" id="input-color-{{ $color->id }}" class="toggle-box">
            <div class="box-item--checked">
                <form action="" class="w-full flex items-center justify-center" method="POST">
                    <label for="input-point{{ $color->id }}" class="capitalize mr-2">
                        input point
                    </label>
                    <div class="flex">
                        <input type="number" name="point" id="input-point{{ $color->id }}"
                            class="section-game__input bg-white border-transparent text-center p-2 rounded text-blue-900"
                            max="100" min="1" data-game-option-id="{{ $color->id }}" required>
                        <x-btn action="submit" type="transparent"
                            add-class="btn--without-hover section-game__btn-submit">
                            <box-icon type='solid' name='send' class="text-white"></box-icon>
                        </x-btn>
                    </div>
                </form>
            </div>
        </label>
        <x-btn type="transparent" text="" add-class="absolute top-0 right-0 section-game__uncheck hidden">
            <box-icon name='x' class="text-white"></box-icon>
        </x-btn>
        <div class="thanks-box">
            <p>
                <span class="font-bold">
                    <var class="point-submitted not-italic"></var>
                    {{-- <span class="uppercase">pts</span> --}}
                </span>
            </p>
            <p>good luck!</p>
            {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full btn-delete-bid px-2 mt-2">
                delete
            </button> --}}
        </div>
    </div>
@endforeach
