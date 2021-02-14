@extends('layouts.master')
@section('title', 'Game saat ini')
@section('body-id', 'game')
@section('main-class', 'flex flex-wrap')
@section('content')
    @include('game.sidebar', ['addClass' => 'lg:h-screen'])
    <section class="section-game py-10 w-full lg:w-9/12">
        <div class="container h-full">
            <article class="section-game__period pb-10 flex items-center justify-between">
                <time class="text-xl">{{ date('d F Y') }}</time>
                <div class="flex flex-col">
                    <h1>Waktu</h1>
                    <time datetime="3:00" class="section-game__timer text-4xl">
                        02:30
                    </time>
                </div>
            </article>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" readonly>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-10">
                @include('game.pick-color')
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-5 gap-5 mb-10">

                    @for ($i = 1; $i <= 10; $i++)
                        @include('game.item', ['option' => $i % 10, 'color' => 'red'])
                    @endfor
                
            </div>
        </div>
    </section>

    @include('game.rules')

@endsection

{{-- js nya ada di game-index.js --}}