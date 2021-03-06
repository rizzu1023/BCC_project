<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\TeamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentResource extends JsonResource
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
            'tournament_name' => $this->tournament_name,
        ];
    }
}
