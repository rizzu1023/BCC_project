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
        return $this->hasMany('App\Teams','tournament_id','id');
    }
}
