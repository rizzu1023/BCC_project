<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $fillable = ['player_id', 'player_name', 'player_role', 'team_id'];

    public function Teams(){
        return $this->belongsTo('App\Teams','team_id','team_id');
    }

}
