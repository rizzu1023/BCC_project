<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameXI extends Model
{
    protected $table = 'gamesxi';

    public function Players(){
        return $this->belongsTo('App\Players','player_id','player_id');
    }

    public function Teams(){
        return $this->belongsTo('App\Teams','team_id','team_id');
    }
}
