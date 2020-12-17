@extends('layouts.master')
@section('title', 'Pakaian dan sepatu')
@section('body-id', 'game')
@section('content')
    <div class="container py-10">
        <section class="section-game">
            <div class="swiper-container section-game__list">
                <div class="swiper-wrapper items-center">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="swiper-slide section-game__item text-white">
                            <label for="choose-option-{{ $i }}" class="text-6xl cursor-pointer">
                                {{ $i }}
                            </label>
                            <p class="capitalize">
                                klik nomor untuk pilih nomor ini
                            </p>
                            <input type="checkbox" name="choose_option" id="choose-option-{{ $i }}">
                            <div class="section-game__item--checked">
                                <div class="flex space-x-4 items-center">
                                    <label for="input-point" class="capitalize">
                                        input point
                                    </label>
                                    <input type="number" name="input_point" id="input-point" class="section-game__input" max="100" min="1">
                                </div>
                                <x-btn type="transparent" text="" 
                                add-class="absolute top-0 right-0 section-game__uncheck">
                                    <box-icon name='x' class="text-white"></box-icon>
                                </x-btn>
                            </div>
                        </div>
                    @endfor
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
    </div>
@endsection