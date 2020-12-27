<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\User;
use App\Models\GameBid;
use App\Models\GameOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        // dd(Carbon::now()->addHours(3)->toDateTimeString());
        return view('game.index', [
            'nextGame' => Game::where('status', 'queued')->limit(3)->get(),
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
            $bid = GameBid::where('user_id', $user->id)
            ->where('game_id', $game->id)
            ->where('game_option_id', $gameOption->id)
            ->first();
            if ($bid) {
                if ($user->point + $bid->point < $request->point) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'point anda tidak cukup'
                    ]);
                }
                $user->point += $bid->point - $request->point;
                $bid->point = $request->point;
                $bid->save();
            } else {
                if ($user->point < $request->point) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'point anda tidak cukup'
                    ]);
                }
                $user->point -= $request->point;
                $bid = GameBid::create([
                    'game_id' => $game->id,
                    'user_id' => $user->id,
                    'game_option_id' => $gameOption->id,
                    'point' => $request->point
                ]);
            }
            $user->save();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'gagal untuk pasang bid !'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'berhasil pasang bid !',
            'bid' => $bid
        ]);
    }

    public function cancelBid(Request $request)
    {
        try {
            $user = User::findOrFail($request->user_id);
            $game = Game::findOrFail($request->game_id);
            $gameOption = GameOption::findOrFail($request->game_option_id);
            $bid = GameBid::where('user_id', $user->id)
            ->where('game_id', $game->id)
            ->where('game_option_id', $gameOption->id)
            ->first();
            if ($bid) {
                $user->point += $bid->point;
                $bid->delete();
                $user->save();
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'gagal untuk menghapus bid !'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'berhasil menghapus bid !'
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
