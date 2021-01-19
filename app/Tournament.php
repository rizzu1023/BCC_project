<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];

    public function Teams(){
        return $this->belongsToMany('App\Teams','team_tournament','tournament_id','team_id')->withPivot(['position'])->withTimestamps();
    }
}
