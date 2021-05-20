<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupTeamResource extends JsonResource
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
            'team_code' => $this->team_code,
            'team_name' => $this->team_name,
            'match' => $this->pivot->match,
            'won' => $this->pivot->won,
            'lost' => $this->pivot->lost,
            'draw' => $this->pivot->draw,
            'points' => $this->pivot->points,
            'nrr' => $this->pivot->nrr,
        ];
    }
}
