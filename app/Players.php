<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $guarded = [];


    public function Teams(){
        return $this->belongsTo('App\Teams','team_id','id')->withDefault([
            'team_name' => 'Team Not available'
        ]);
    }

    public function addPlayer(){

        $data = request()->validate([
            'player_id' => 'required',
            'player_name' => 'required',
            'player_role' => 'required',
            'team_id' => 'required',
        ]);

        return Players::create($data);
    }

    public function updatePlayer(){
        $data= request()->validate([
            'player_id' => 'required|min:2',
            'player_name' => 'required',
            'player_role' => 'required',
            'team_id' => 'required',
          ]);

        return $this->update($data);
    }
}
