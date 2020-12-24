@extends('layouts.master')
@section('title', 'Pakaian dan sepatu')
@section('body-id', 'game')
@section('content')
    <div class="container py-10">
        <section class="section-game">
            <div class="swiper-container section-game__list">
                <div class="swiper-wrapper items-center">
                    @foreach($gameOptions as $option)
                        <div class="swiper-slide section-game__item bg-{{ $option->color }}-600 text-white">
                            <label for="choose-option-{{ $option->number }}" class="text-6xl cursor-pointer">
                                {{ $option->number }}
                            </label>
                            <p class="capitalize">
                                klik nomor untuk pilih nomor ini
                            </p>
                            <p>
                                Hadiah Point X{{ $option->point_multiplier }}
                            </p>
                            <input type="checkbox" name="choose_option" id="choose-option-{{ $option->number }}">
                            <div class="section-game__item--checked">
                                <form action="/test" method="POST" 
                                class="flex items-center section-game__form">
                                    @csrf
                                    <label for="input-point" class="capitalize mr-4">
                                        input point
                                    </label>
                                    <input type="number" name="point" id="input-point" class="section-game__input" max="100" min="1" required>
                                    <x-btn action="submit" type="transparent" add-class="btn--without-hover section-game__btn-submit">
                                        <box-icon type='solid' name='send' 
                                        class="text-white"></box-icon>
                                    </x-btn>
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
                                        <var class="point-submitted not-italic"></var>PTS
                                    </span>
                                </p>
                                <p>good luck with your gambling!</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="section-game__btn-slide section-game__btn-slide--next">
                    <box-icon type='solid' name='chevron-right' class="text-white"></box-icon>
                </div>
                <div class="section-game__btn-slide section-game__btn-slide--prev">
                    <box-icon name='chevron-left' type='solid' class="text-white"></box-icon>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script>
        document.querySelectorAll('.section-game__form').forEach(formSubmitGame => {
            const gameItem = formSubmitGame.parentElement.parentElement
            const gameInputPoint = formSubmitGame.querySelector('.section-game__input')

            formSubmitGame.addEventListener('submit', (e) => {
                e.preventDefault()

                if (gameInputPoint.value.trim() != null) {
                    // close the form input point
                    gameItem.querySelector('input[name="choose_option"]').checked = false
                    
                    // open the modal says "you're inputing {point_value}, 
                    // good luck with your gambling!"
                    gameItem.querySelector('.point-submitted').textContent = gameInputPoint.value.trim()
                    gameItem.querySelector('.section-game__thank-you')
                    .classList
                    .add('section-game__thank-you--show')
                }

            })
        })
    </script>
@endpush