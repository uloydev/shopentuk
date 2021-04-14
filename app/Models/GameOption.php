<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'color',
        'type',
    ];

    protected $appends = ['html_class'];

    public function setGamePoint($value) 
    {
        $this->attributes['point'] = (int) $value;
    }

    public function getHtmlClassAttribute() 
    {
        return "bg-".$this->attributes['color']."-500";
    }

    public function rewards()
    {
        return $this->hasMany('App\Models\GameOptionReward', 'winner_option_id');
    }
}
