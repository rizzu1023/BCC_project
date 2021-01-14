<?php

namespace App\Http\Resources;

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
            'team' => $this->Teams,
            'group_id' => $this->group_id,
            'match' => $this->match,
            'won' => $this->won,
            'lost' => $this->lost,
            'draw' => $this->draw,
            'points' => $this->points,
            'nrr' => $this->nrr,
            'tournament_id' => $this->tournament_id
        ];
    }
}
