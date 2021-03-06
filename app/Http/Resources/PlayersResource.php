<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayersResource extends JsonResource
{
    private $team_name;
    /**
     * Transform the resource into an array.
     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
     */
//    public function __construct($resource , $team_name)
//    {
//        parent::__construct($resource);
//        $this->resource = $resource;
//        $this->team_name = $team_name;
//
//    }

    public function toArray($request)
    {
        $age = Carbon::parse($this->dob)->diff(\Carbon\Carbon::now())->format('%y');
        if($this->dob){
            $dob = date('d-M-Y',strtotime($this->dob));
            $age = Carbon::parse($this->dob)->diff(\Carbon\Carbon::now())->format('%y');
        }
        else{
            $dob = NULL;
            $age = NULL;
        }

        return [
            'id' => $this->id,
            'player_profile' => $this->getFirstMedia('player-image') ? $this->getFirstMedia('player-image')->getUrl('player-profile') : NULL,
            'player_id' => $this->player_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'role' => $this->Role->name,
            'dob' => $dob,
            'age' => $age,
            'batting_style' => $this->BattingStyle->name,
            'bowling_style' => $this->BowlingStyle->name,
//            'player_team' => $this->Teams,
        ];
    }
}
