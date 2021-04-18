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

    public function currentGame(Request $request)
    {
        $game = Game::with(['winners'])->firstWhere('status', 'playing');
        $gameBids = $game->bids;
        $options = GameOption::where('type', 'number')->with(['rewards'])->get();
        foreach ($options as $option) {
            $calculatedPoint = 0;
            $bids = $gameBids->whereIn('game_option_id', $option->rewards->pluck('game_option_id'));
            foreach ($bids as $bid) {
                $reward = $option->rewards->firstWhere('game_option_id', $bid->game_option_id);
                if ($reward) {
                    $calculatedPoint += $bid->point * $reward->value;
                }
            }
            $option->setCalculatedPoint($calculatedPoint);
            $option->setGamePoint($bids->sum('point'));
        }
        if ($request->ajax()) {
            return response()->json([
                'game' => $game,
                'options' => $options,
                'current_time' => Carbon::now()
            ]);
        }
        return view('game.admin.current-game')->with([
            'title' => 'Current Game'
        ]);
    }

    public function setGameWinner(Request $request)
    {
        $request->validate([
            'winner_option_id' => ['required', 'exists:game_options,id', 'numeric'],
            'game_id' => ['required', 'exists:games,id', 'numeric'],
        ]);
        $game = Game::findOrFail($request->game_id);
        $game->update([
            'is_custom' => true,
            'winner_option_id' => $request->winner_option_id
        ]);
        return redirect()->route('admin.game.current')->with([
            'success' => 'sukses menentukan pemenang game'
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
