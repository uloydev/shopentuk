<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GameOptionReward extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'game_option_id',
        'winner_option_id',
    ];

    protected $with = ['gameOption'];

    public function gameOption()
    {
        return $this->belongsTo('App\Models\GameOption');
    }

    public function winnerOption()
    {
        return $this->belongsTo('App\Models\GameOption', 'winner_option_id');
    }
}
