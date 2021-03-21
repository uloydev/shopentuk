<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'started_at',
        'ended_at',
        'status',
        'winner_option_id',
        'point_in',
        'point_out',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    protected $appends = [
        'formatted_start_time',
        'game_period'
    ];

    public function bids()
    {
        return $this->hasMany('App\Models\GameBid');
    }

    public function winnerOption()
    {
        return $this->belongsTo('App\Models\GameOption', 'winner_option_id');
    }

    public function getFormattedStartTimeAttribute()
    {
        $startedAt = Carbon::parse($this->attributes['started_at']);
        return $startedAt->format("d M Y") . " jam " . $startedAt->format("H:i");
    }

    public function getGamePeriodAttribute()
    {
        $startedAt = Carbon::parse($this->attributes['started_at']);
        return $startedAt->format('d/m/Y') . '-' . $this->attributes['id'];
    }
}
