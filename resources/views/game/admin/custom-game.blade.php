@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
    <div id="accordion" class="custom-accordion mb-4">
        <div class="card">
            <div class="card-header">
                <h1 class="h3 font-weight-bold">{{ ucwords($title) }}</h1>
            </div>
            <div class="card-body text-center text-lg-left">
                <button type="button" data-toggle="modal" data-target="#addCustomGame" class="btn btn-success mb-3">
                    Create New Custom Game
                </button>
                <div class="table-responsive">
                    @if (count($games) == 0)
                        <x-adminmart-alert is-dismissable="false" message="There's no custom games right now"
                            type="secondary">
                            @include('partial.btn-refresh')
                        </x-adminmart-alert>
                    @else
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                            'thead' => [
                            'Period',
                            'status',
                            'start',
                            'bid count',
                            'winner option',
                            'point total',
                            'reward total',
                            ]
                            ])
                            <tbody>
                                @foreach ($games as $game)
                                    <tr class="product-item">
                                        @include('partial.tbody', [
                                        'td' => [
                                        $game->game_period,
                                        $game->status,
                                        $game->started_at,
                                        $game->bid_count,
                                        $game->winnerOption->type == 'color'
                                        ? $game->winnerOption->color
                                        : $game->winnerOption->number,
                                        $game->point_in,
                                        $game->point_out
                                        ]
                                        ])
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- end custom accordions-->
    @include('game.admin.add-edit')
@endsection
@push('scripts')
    <script>
        @error('started_at')
            $('#addCustomGame').modal('show');
        @enderror

    </script>
@endpush
