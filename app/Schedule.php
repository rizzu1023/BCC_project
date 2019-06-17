<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = []; 
    
    public function Teams1(){
        return $this->belongsTo('App\Teams','team1_id','id');
    }
    public function Teams2(){
        return $this->belongsTo('App\Teams','team2_id','id');
    }
}
