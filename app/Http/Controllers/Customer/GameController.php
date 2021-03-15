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

class GameController extends Controller
{
    public function index()
    {
        return view('game.index', [
            'options' => GameOption::all(),
            'nextGame' => Game::where('status', 'queued')->limit(3)->get(),
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

    public function currentGame(Request $request)
    {
        $game = Game::orderBy('started_at', 'DESC')->firstWhere('status', '!=', 'queued');
        return response()->json([
            'game' => $game,
            'winnerOptions' => GameOptionReward::with('gameOption')->where('winner_option_id', $game->winner_option_id)->get(),
            'currentTime' => Carbon::now(),
            'nextGame' => Game::where('status', 'queued')->limit(3)->get(),
            'userPoint' => User::findOrFail($request->userId)->point,
            'userBids' => GameBid::where('user_id', $request->userId)->where('game_id', $game->id)->get()
        ]);
    }

    public function test()
    {
        // cek jika game kosong maka seed game
        if (!Game::count()) {
            $now = Carbon::now();
            $now->second = 0;
            while ($now->minute % 3 != 0) {
                $now->minute++;
            }
            // create new game
            for ($i=0; $i < 5; $i++) { 
                $game = new Game();
                $game->started_at = $now;
                $now->addMinute(3);
                $game->ended_at = $now;
                $game->status = 'queued';
                $game->save();
            }
            Game::first()->update(['status' => 'playing']);
            return 'ok';
        }
        
        // creating variables data
        $currentGame = Game::firstWhere('status', 'playing');
        $nextGame = Game::firstWhere('status', 'queued');
        // $numberOptions = GameOption::where('type', 'number')->get();
        $gameBids = $currentGame->bids;
        // jika jml bid = 0 maka random winner pick
        if ($gameBids->count() > 0) {
            // kelompok option berdasar warna
            $colorOptions = GameOption::where('type', 'color')->get();
            // pilih warna dengan poin terkecil
            $winnerColor = $this->getSmallestPoint($colorOptions, $currentGame->id);
            // kelompokan option berdasar angka
            $numberOptions = GameOption::whereIn(
                'id',
                GameOptionReward::where('game_option_id', $winnerColor->id)->pluck('winner_option_id')
            )->get();
            // pilih angka dengan poin terkecil sbg pemenang
            $winnerOption = $this->getSmallestPoint($numberOptions, $currentGame->id);
        } else {
            // random pick
            $winnerOption = GameOption::inRandomOrder()->firstWhere('type', 'number');
        }
        // get winner bids
        $winnerBids = $gameBids->whereIn(
            'game_option_id',
            GameOptionReward::where('winner_option_id', $winnerOption->id)->pluck('game_option_id')
        );
        // get loser bids
        $loserBids = $gameBids->diff($winnerBids);
        // update loser bids
        GameBid::whereIn('id' ,$loserBids->pluck('id'))->update([
            'status' => 'lose'
        ]);
        // update winner bids
        GameBid::whereIn('id' ,$winnerBids->pluck('id'))->update([
            'status' => 'win'
        ]);
        // send reward to winners
        $pointOut = 0;
        foreach ($winnerBids as $bid) {
            $user = $bid->user;
            $optionReward = GameOptionReward::where('winner_option_id', $winnerOption->id)->where('game_option_id', $bid->game_option_id)->first();
            $pointReward = $bid->point * $optionReward->value;
            $user->point += $pointReward;
            $user->save();
            $pointOut += $pointReward;
            PointHistory::create([
                'value' => $pointReward,
                'description' => 'game winner reward',
                'user_id' => $user->id
            ]);
        }
        // update current game state
        $currentGame->update([
            'status' => 'finished',
            'winner_option_id' => $winnerOption->id,
            'point_in' => $gameBids->sum('point'),
            'point_out' => $pointOut
        ]);
        // start new game
        $nextGame->update(['status'=> 'playing']);
        // add new game to database
        $lastGame = Game::latest()->first();
        Game::create([
            'started_at' => $lastGame->ended_at,
            'ended_at' => $lastGame->ended_at->addMinute(3),
        ]);
    }

    private function getSmallestPoint($options, $gameId)
    {
        foreach ($options as $option) {
            $point = GameBid::where('game_id', $gameId)->where('game_option_id', $option->id)->sum('point');
            $option->setGamePoint($point);
        }
        return $options->sortBy('point')->first();
    }
}
