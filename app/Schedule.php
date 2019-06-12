<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['match_no', 'team1_id', 'team2_id', 'tournament', 'times', 'dates'];
    public function Teams1(){
        return $this->belongsTo('App\Teams','team1_id','team_id');
    }
    public function Teams2(){
        return $this->belongsTo('App\Teams','team2_id','team_id');
    }
}
