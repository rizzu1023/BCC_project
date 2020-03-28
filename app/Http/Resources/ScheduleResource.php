<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
           'team1_id' => $this->Teams1,
           'team2_id' => $this->Teams2,
            'times' => $this->times,
            'dates' => $this->dates,
            'tournament_id' => $this->tournament_id,

        ];
    }
}
