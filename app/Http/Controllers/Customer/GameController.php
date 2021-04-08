<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\User;
use App\Models\GameBid;
use App\Models\GameOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GameOptionReward;
use App\Models\PointHistory;
use App\Models\Rules;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        return view('game.index', [
            'options' => GameOption::all(),
            // 'nextGame' => Game::where('status', 'queued')->limit(3)->get(),
            'rule' => Rules::first(),
            'currentTime' => Carbon::now(),
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
            if ($request->point <= 0) {
                throw new Exception("Input Point Salah", 1);
            }
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
                PointHistory::create([
                    'value' => $request->point,
                    'user_id' => $user->id,
                    'description' => 'GameBid'
                ]);
            }
            $user->save();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'gagal !',
                'bid' => $bid,
                'lastTenBids' => GameBid::where('user_id', $user->id)->latest()->limit(10)->get(),
                'lastGames' => Game::with('winners')->latest()->where('status', 'finished')->limit(5)->get(),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'berhasil !',
            'bid' => $bid,
            'lastBids' => GameBid::where('user_id', $user->id)->latest()->limit(5)->get(),
            'lastGames' => Game::with('winners')->latest()->where('status', 'finished')->limit(5)->get(),
        ]);
    }

    // public function cancelBid(Request $request)
    // {
    //     try {
    //         $user = User::findOrFail($request->user_id);
    //         $game = Game::findOrFail($request->game_id);
    //         $gameOption = GameOption::findOrFail($request->game_option_id);
    //         $bid = GameBid::where('user_id', $user->id)
    //             ->where('game_id', $game->id)
    //             ->where('game_option_id', $gameOption->id)
    //             ->first();
    //         if ($bid) {
    //             $user->point += $bid->point;
    //             $bid->delete();
    //             $user->save();
    //         }
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'gagal untuk menghapus bid !'
    //         ]);
    //     }
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'berhasil menghapus bid !'
    //     ]);
    // }

    public function currentGame(Request $request)
    {
        $game = Game::orderBy('started_at', 'DESC')->firstWhere('status', '!=', 'queued');
        return response()->json([
            'game' => $game,
            'winnerOptions' => GameOptionReward::with('gameOption')->where('winner_option_id', $game->winner_option_id)->get(),
            'currentTime' => Carbon::now(),
            'userPoint' => User::findOrFail($request->userId)->point,
            'userBids' => GameBid::where('user_id', $request->userId)->where('game_id', $game->id)->get(),
            'lastBids' => GameBid::where('user_id', $request->userId)->latest()->limit(5)->get(),
            'lastGames' => Game::with('winners')->latest()->where('status', 'finished')->limit(5)->get(),
        ]);
    }

    public function gameHistory()
    {
        return view('game.game-history')->with([
            'games' => Game::with('winners')->latest()->where('status', 'finished')->limit(50)->paginate(),
            'rule' => Rules::first(),
            'currentTime' => Carbon::now(),
        ]);
    }

    public function bidHistory()
    {
        $gameIds = Game::latest()->where('status', '!=', 'queued')->limit(30)->pluck('id');
        return view('game.bid-history')->with([
            'bids' => GameBid::latest()->where('user_id', Auth::id())->whereIn('game_id', $gameIds)->paginate(15),
            'rule' => Rules::first(),
            'currentTime' => Carbon::now(),
        ]);
    }

    public function optionReward()
    {
        return view('game.option-reward')->with([
            'rewards' => GameOptionReward::with(['gameOption', 'winnerOption'])->get(),
            'rule' => Rules::first(),
            'currentTime' => Carbon::now(),
        ]);
    }
}
