<div class="section-game__item bg-{{ $color }}-500">
    @php
        $id = "choose-option-$option->number";
    @endphp
    <label class="section-game__slide-number" 
    for="{{ $id }}">
        {{ $option->number }}
    </label>
    <p class="section-game__paragraph">
        klik nomor untuk pilih nomor ini
    </p>
    <input type="checkbox" name="choose_option"
    id="{{ $id }}">
    <div class="section-game__item--checked">
        <form action="" method="POST">
            <label for="input-point{{ $option->number }}" 
            class="capitalize">
                input point
            </label>
            <div class="flex">
                <input type="number" name="point" 
                id="input-point{{ $option->number }}" 
                class="section-game__input" max="100" min="1" 
                data-game-option-id="{{ $option->id }}" required>
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
    <div class="section-game__thank-you">
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