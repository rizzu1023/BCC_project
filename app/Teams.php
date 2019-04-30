<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function Players(){
        return $this->hasMany('App\Players','team_id','team_id');
    }
}
