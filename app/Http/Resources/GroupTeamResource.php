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

        $formated_nrr = (float)number_format((float)$this->nrr, 2, '.', '');

        return [
            'id' => $this->id,
            'team' => $this->Teams,
            'group_id' => $this->group_id,
            'match' => $this->match,
            'won' => $this->won,
            'lost' => $this->lost,
            'draw' => $this->draw,
            'points' => $this->points,
            'nrr' => $formated_nrr,
            'tournament_id' => $this->tournament_id
        ];
    }
}
