<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
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
}
