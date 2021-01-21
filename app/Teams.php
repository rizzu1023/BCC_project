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
        return $this->belongsTo('App\Tournament','id','tournament_id');
    }

    public function Players(){
        return $this->belongsToMany('App\Players','player_team','team_id','player_id')->withTimestamps();
    }
}
