<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchDetail extends Model
{
  protected $guarded = [];

  public function Teams(){
      return $this->belongsTo('App\Teams','team_id','id');
  }

  public function Match(){
    return $this->belongsTo('App\Match','match_id','match_id');
  }
}
 