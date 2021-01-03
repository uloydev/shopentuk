@extends('layouts.master')
@section('title', 'Game saat ini')
@section('body-id', 'game')
@section('content')
    @include('game.sidebar')
    <section class="section-game py-10">
        <div class="container h-full">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" readonly>
            <div class="section-game__content flex items-center space-x-10">
                <div class="grid grid-rows-2 text-white gap-4">
                    @foreach ($gamesGreen as $option)
                        @include('game.item', ['option' => $option, 'color' => 'green'])
                    @endforeach
                </div>

                <div class="grid grid-cols-2 text-white gap-4">
                    @foreach ($gamesPurple as $option)
                        @include('game.item', ['option' => $option, 'color' => 'purple'])
                    @endforeach
                </div>

                <div class="grid grid-cols-2 text-white gap-4">
                    @foreach ($gamesRed as $option)
                        @include('game.item', ['option' => $option, 'color' => 'red'])
                    @endforeach
                </div>

            {{-- <div class="swiper-container section-game__list">
                <div class="swiper-wrapper items-center">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    @foreach($gameOptions as $option)
                        <div class="swiper-slide text-white
                        section-game__item bg-{{ $option->color }}-600">
                            <label for="choose-option-{{ $option->number + 1 }}" 
                            class="section-game__slide-number">
                                {{ $option->number + 1 }}
                            </label>
                            <p class="section-game__paragraph">
                                klik nomor untuk pilih nomor ini
                            </p>
                            <p class="section-game__paragraph">
                                Hadiah Point x {{ $option->point_multiplier }}
                            </p>
                            <input type="checkbox" name="choose_option" 
                            id="choose-option-{{ $option->number + 1 }}">
                            <div class="section-game__item--checked">
                                <form action="" method="POST" 
                                class="flex items-center section-game__form">
                                    <label for="input-point{{ $option->number + 1 }}" 
                                    class="capitalize mr-4">
                                        input point
                                    </label>
                                    <input type="number" name="point" 
                                    id="input-point{{ $option->number + 1 }}" class="section-game__input" max="100" min="1" 
                                    data-game-option-id="{{ $option->id }}" required>
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
                                        <var class="point-submitted not-italic"></var>
                                        <span class="uppercase">pts</span>
                                    </span>
                                </p>
                                <p>good luck with your gambling!</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="section-game__btn-slide section-game__btn-slide--next">
                    <box-icon type='solid' name='chevron-right' class="text-white"></box-icon>
                </div>
                <div class="section-game__btn-slide section-game__btn-slide--prev">
                    <box-icon name='chevron-left' type='solid' class="text-white"></box-icon>
                </div>
            </div> --}}
        </div>
    </section>

    @include('game.rules')

@endsection

{{-- js nya ada di resources/assets/js/page/game-index.js --}}