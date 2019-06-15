<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $guarded = [];

    public function Teams(){
        return $this->belongsToMany('App\Teams','team_tournament','tournament_id','team_id');
    }
}
