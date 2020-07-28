<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
//    protected $fillable  = ['status'];
    protected $guarded = [];

    public function Teams(){
        return $this->belongsTo('App\Teams','toss','id');
    }

    public function Teams1(){
        return $this->belongsTo('App\Teams','team2_id','id');
    }

    public function Teams2(){
        return $this->belongsTo('App\Teams','team1_id','id');
    }

    public function MatchDetail(){
        return $this->hasMany('App\MatchDetail','match_id','match_id');
    }

    public function MatchPlayers(){
        return $this->hasMany('App\MatchPlayers','match_id','match_id')->orderBy('updated_at','asc');
    }

    public function WON(){
        return $this->belongsTo('App\Teams','won','id');
    }

    public function MOM(){
        return $this->belongsTo('App\Teams','mom','id');
    }

}
