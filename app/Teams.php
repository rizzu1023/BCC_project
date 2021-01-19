<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    protected $guarded = [];

//    public function Players(){
//        return $this->hasMany('App\Players','team_id','id');
//    }

    public function Schedule1(){
        return $this->hasMany('App\Schedule','team1_id','id');
    }
    public function Schedule2(){
        return $this->hasMany('App\Schedule','team2_id','id');
    }

    public function Tournaments(){
        return $this->belongsToMany('App\Tournament','team_tournament','team_id','tournament_id')->withPivot(['position'])->withTimestamps();;
    }

    public function Players(){
        return $this->belongsToMany('App\Players','player_team','team_id','player_id')->withTimestamps();
    }
}
