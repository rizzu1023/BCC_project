<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $guarded = [];
    
    public function Teams(){
        return $this->belongsTo('App\Teams','team_id','id');
    }

}
