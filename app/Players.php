<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $guarded = [];

//    public function Teams(){
//        return $this->belongsTo('App\Teams','team_id','id')->withDefault([
//            'team_name' => 'Team Not available'
//        ]);
//    }

    public function Teams(){
        return $this->belongsToMany('App\Teams','player_team','player_id','team_id')->withTimestamps();
    }
}
