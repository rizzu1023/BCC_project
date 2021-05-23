<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'match_no' => $this->match_no,
            'status' => $this->Game ? $this->Game->status : NULL,
            'team1_id' => $this->team1_id,
            'team1_code' => $this->Teams1->team_code,
            'team1_name' => $this->Teams1->team_name,
            'team2_id' => $this->team2_id,
            'team2_code' => $this->Teams2->team_code,
            'team2_name' => $this->Teams2->team_name,
            'dates' => date('d-M-Y', strtotime($this->dates)),
            'times' => date('h:m A', strtotime($this->times)),
        ];
    }
}
