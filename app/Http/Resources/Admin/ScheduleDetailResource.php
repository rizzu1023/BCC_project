<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\PlayersResource;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'match_no' => $this->match_no,
            'toss' => [
                [
                    'id' => $this->Teams1->id,
                    'name' => $this->Teams1->team_name,
                ],
                [
                    'id' => $this->Teams2->id,
                    'name' => $this->Teams2->team_name,
                ],
            ],
            'team1_players' => $this->Teams1 ? PlayingXIResource::collection($this->Teams1->Players) : NULL,
            'team2_players' => $this->Teams2 ? PlayingXIResource::collection($this->Teams2->Players) : NULL,
            'times' => $this->times,
            'dates' => $this->dates,
            'tournament_id' => $this->tournament_id,
        ];
    }
}
