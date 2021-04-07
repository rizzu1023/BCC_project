<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Players extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = [];

//    public function Teams(){
//        return $this->belongsTo('App\Teams','team_id','id')->withDefault([
//            'team_name' => 'Team Not available'
//        ]);
//    }

    public function Teams(){
        return $this->belongsToMany('App\Teams','player_team','player_id','team_id')->withTimestamps();
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('player-image')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('player-profile')
                    ->width(200)
                    ->height(200)
                    ->sharpen(10);
            });
    }
}
