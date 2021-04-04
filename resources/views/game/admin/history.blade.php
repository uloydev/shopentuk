@extends('layouts.template')
@section('body-id', Str::camel($title))
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-12">
        <div id="accordion" class="custom-accordion mb-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 font-weight-bold">{{ ucwords($title) }}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($games) == 0)
                        <x-adminmart-alert is-dismissable="false" 
                        message="There's no order right now" type="secondary">
                            @include('partial.btn-refresh')
                        </x-adminmart-alert>
                        @else
                            <table class="table table-striped table-bordered no-wrap" id="zero_config">
                                @include('partial.thead', [
                                    'thead' => [
                                        'Period',
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
    </div>
</div>
@endsection