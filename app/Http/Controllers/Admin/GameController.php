<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameOption;
use App\Rules\GameStartTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GameController extends Controller
{
    public function history()
    {
        return view('game.admin.history')->with([
            'title' => 'Game History',
            'games' => Game::with('winnerOption')->where('status', 'finished')->get()
        ]);
    }

    public function customGame()
    {
        $options = GameOption::where('type', 'number')->get();
        $arrOptions = [];
        foreach( $options as $option ) {
            array_push($arrOptions, [
                'value' => $option->id,
                'text' => $option->number
            ]);
        }
        $inputColumn = [
            [
                'name' => 'started_at',
                'type' => 'datetime-local',
                'label' => 'Start time',
                'id' => 'game-started-at',
            ],
            [
                'name' => 'winner_option_id',
                'type' => 'select',
                'label' => 'Winner Option',
                'id' => 'game-winner',
                'placeholder' => 'Choose Winner',
                'options' => json_encode($arrOptions)
            ]
        ];
        return view('game.admin.custom-game')->with([
            'title' => 'Custom Game List',
            'games' => Game::where('is_custom', true)->get(),
            'inputColumn' =>  $inputColumn,
        ]);
    }


    public function storeCustomGame(Request $request)
    {
        $validated = $request->validate([
            'started_at' => [new GameStartTime],
            'winner_option_id' => ['numeric']
        ]);
        
        $startTime = Carbon::parse($validated['started_at']);
        $endTime = clone $startTime;
        $endTime->addMinutes(2);
        Game::updateOrCreate(
            [
                'started_at' => $startTime,
                'status' => 'queued'
            ],
            [
                'ended_at' => $endTime,
                'winner_option_id' => $validated['winner_option_id'],
                'is_custom' => true
            ]
        );
        return redirect()->route('admin.game.custom-game');
    }
}
