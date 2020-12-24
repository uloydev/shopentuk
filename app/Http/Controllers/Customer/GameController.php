<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\GameOption;
use App\Models\GameBid;

class GameController extends Controller
{
    public function index()
    {
        return view('game.index', [
            'gameOptions' => GameOption::orderBy('number')->get(),
        ]);
    }

    public function nextGame()
    {
        return view('game.next', ['title' => 'next game']);
    }

    public function rules()
    {
        return view('game.rules', ['title' => 'rules game']);
    }
}
