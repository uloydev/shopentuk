<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Game;
use App\Model\GameOption;
use App\Model\GameBid;

class GameController extends Controller
{
    public function index()
    {
        return view('game.index');
    }
}
