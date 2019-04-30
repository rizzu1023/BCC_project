<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function Players(){
        return $this->hasMany('App\Players','team_id','team_id');
    }

    public function Schedule1(){
        return $this->hasMany('App\Schedule','team1_id','team_id');
    }
    public function Schedule2(){
        return $this->hasMany('App\Schedule','team2_id','team_id');
    }
}
