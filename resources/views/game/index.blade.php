@extends('layouts.master')
@section('title', 'Game saat ini')
@section('body-id', 'game')
@section('main-class', 'flex flex-wrap')
@section('content')
    @include('game.sidebar')
    <section class="section-game py-10 w-full lg:w-9/12">
        <div class="container h-full">
            <article class="section-game__period pb-10 flex items-center justify-between">
                <div>
                    <p class="text-xl">
                        Game Period : <span id="gamePeriod">{{ date('d F Y') }}</span>
                    </p>
                    <p class="text-xl">
                        Game Status : <span id="gameStatus">Playing</span>
                    </p>
                </div>
                <div class="flex flex-col">
                    <h1>Waktu</h1>
                    <time datetime="3:00" class="section-game__timer text-4xl">
                        00:00
                    </time>
                </div>
            </article>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" readonly>

            <div id="playingContent">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-10">
                    @include('game.pick-color')
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-5 gap-5 mb-10">
                    @foreach ($options->where('type', 'number') as $option)
                        @include('game.item', ['option' => $option])
                    @endforeach
                </div>
            </div>
            {{-- <div id="finishedContent" class="text-center" hidden>
                <h1 class="text-xl font-bold mb-5">Game Telah Selesai</h1>
                <h3>Pemenang Game Adalah </h3>
                <ul id="winnerOptions">
                    <li>Merah</li>
                    <li>Angka 9</li>
                </ul>
                <h3 class="mt-10 font-bold">Bid Anda</h3>
                <ul id="userBids">
                    <li>No 9 (10 point) => 20 point (menang)</li>
                </ul>
            </div> --}}
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="py-10 px-4">
                <p class="text-xl my-5">Last 10 Bids</p>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200" id="gameTable">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Period
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Number
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Color
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            point
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            reward
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-center">
                                    <!-- More items... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('game.rules')

@endsection

{{-- js nya ada di game-index.js --}}
