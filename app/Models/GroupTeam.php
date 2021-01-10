<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupTeam extends Model
{
    protected $guarded = [];

    public function Teams()
    {
        return $this->hasONe('App\Teams','id','team_id');
    }
}
