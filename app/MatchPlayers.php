<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayers extends Model
{
    protected $guarded = [];

    public function Players(){
        return $this->belongsTo('App\Players','player_id','player_id');
    }

    public function wicketPrimary(){
        return $this->belongsTo('App\Players','wicket_primary','player_id');
    }
    public function wicketSecondary(){
        return $this->belongsTo('App\Players','wicket_secondary','player_id');
    }

    public function Teams(){
        return $this->belongsTo('App\Teams','team_id','id');
    }

    public function Match(){
        return $this->belongsTo('App\Match','match_id','match_id');
    }

    public function MatchDetail(){
        return $this->belongsTo('App\MatchDetail','match_id','match_id');
    }


}
