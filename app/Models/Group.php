<?php

namespace App\Models;

use App\Teams;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function Tournament()
    {
        return $this->belongsTo('App\Tournament','tournament_id','id');
    }

    public function Teams()
    {
        return $this->belongsToMany(Teams::class,'group_teams','group_id','team_id')->withPivot('match','won','lost','draw','points','nrr');
    }
}
