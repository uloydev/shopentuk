@extends('layouts.master')
@section('title', 'Game History')
@section('body-id', 'game')
@section('main-class', 'flex flex-wrap')
@section('content')
    @include('game.sidebar')
    <section class="section-game py-10 w-full lg:w-9/12">
        <div class="container h-full">
            <a href="{{ route('game.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-600 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full ml-4">
                Back to Game
            </a>
            {{-- last 5 games table --}}
            <div class="py-4 px-4">
                <p class="text-xl my-5">Last 50 Games</p>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200" id="gameTable">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Period
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            bid count
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            winner option
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            point total
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            reward total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-center">
                                    @forelse ($games as $game)
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap">{{ $game->game_period }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">{{ $game->bid_count }}</td>
                                            @if ($game->winnerOption->type == 'color')
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $game->winnerOption->color }}</td>
                                            @else
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $game->winnerOption->number }}</td>
                                            @endif
                                            <td class="px-4 py-3 whitespace-nowrap">{{ $game->point_in }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">{{ $game->point_out }}</td>
                                        </tr>
                                    @empty
                                        <p class="text-center">No data.</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4">
                {{ $games->links() }}
            </div>
        </div>
    </section>

    @include('game.rules')

@endsection

{{-- js nya ada di game-index.js --}}
