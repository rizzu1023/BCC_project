<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayersResource extends JsonResource
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
            'player_id' => $this->player_id,
            'player_name' => $this->player_name,
            'player_role' => $this->player_role,
//            'player_team' => $this->Teams,
        ];
    }
}
