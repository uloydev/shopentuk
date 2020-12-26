<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\GameOption;
use App\Models\GameBid;
use App\Models\User;

class GameController extends Controller
{
    public function index()
    {
        return view('game.index', [
            'gameOptions' => GameOption::orderBy('number')->get(),
        ]);
    }

    public function makeBid(Request $request)
    {
        // $request = user_id, game_id, game_option_id, point
        try {
            $user = User::findOrFail($request->user_id);
            $game = Game::findOrFail($request->game_id);
            $gameOption = GameOption::findOrFail($request->game_option_id);
            if ($user->point < $request->point) {
                throw new Exception;
            }
            $user->point -= $request->point;
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'gagal untuk pasang bid !'
            ]);
        }
        GameBid::create([
            'game_id' => $game->id,
            'user_id' => $user->id,
            'game_option_id' => $gameOption->id,
            'point' => $request->point
        ]);
    }

    public function rules()
    {
        return view('game.rules', ['title' => 'rules game']);
    }

    public function currentGame()
    {
        return response()->json(Game::where('status', 'playing')->first());
    }
}
