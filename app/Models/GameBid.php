<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameBid extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'point',
        'game_id',
        'user_id',
        'game_option_id',
        'reward'
    ];

    protected $with = ['gameOption'];

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function gameOption()
    {
        return $this->belongsTo('App\Models\GameOption');
    }
}
