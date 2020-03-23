<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BattingResource extends JsonResource
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
            'playerDetail' => new PlayersResource($this->Players),
            'bt_matches' => $this->bt_matches,
            'bt_innings' => $this->bt_innings,
            'bt_balls' => $this->bt_balls,
            'bt_fours' => $this->bt_fours,
        ];
    }
}
