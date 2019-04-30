<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    public function Teams(){
        return $this->belongsTo('App\Teams','team_id','team_id');
    }
}
