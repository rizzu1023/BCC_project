<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsTable extends Model
{
    protected $guarded = [];

    
    public function Teams(){
        return $this->hasOne('App\Teams','id','team_id');
    }
}
