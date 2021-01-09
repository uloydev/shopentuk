@extends('layouts.master')
@section('title', 'Game saat ini')
@section('body-id', 'game')
@section('content')
    @include('game.sidebar')
    <section class="section-game py-10">
        <div class="container h-full">
            <article class="section-game__period">
                <time class="text-xl">{{ date('d F Y') }}</time>
                <div class="flex flex-col">
                    <h1>Waktu</h1>
                    <time datetime="3:00" class="section-game__timer">03:00</time>
                </div>
            </article>
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
            </div>
        </div>
    </section>

    @include('game.rules')

@endsection

{{-- js nya ada di game-index.js --}}