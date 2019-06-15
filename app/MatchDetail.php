<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchDetail extends Model
{
  protected $guarded = [];

  public function Teams(){
      return $this->belongsTo('App\Teams','team_id','team_id');
  }
}
