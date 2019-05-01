<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsTable extends Model
{
    public function Teams(){
        return $this->hasOne('App\Teams','team_id','team_id');
    }
}
