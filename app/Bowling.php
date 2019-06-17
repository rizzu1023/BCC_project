<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bowling extends Model
{
    protected $guarded = [];

    
    public function Players(){
        return $this->hasOne('App\Players','player_id','player_id');
    }
}
