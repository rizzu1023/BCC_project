<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchTrack extends Model
{
    protected $guarded = [];

    public function Players(){
        return $this->belongsTo('App\Players','attacker_id','player_id');
    }

    public function Batsman(){
        return $this->belongsTo('App\Players','player_id','player_id');
    }
}
