<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchPlayersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'match_id' => $this->match_id,
            'team_id' => $this->team_id,
            'bt_status' => $this->bt_status,
            'bt_runs' => $this->bt_runs,
            'bt_balls' => $this->bt_balls,
            'bt_fours' => $this->bt_fours,
            'bt_sixes' => $this->bt_sixes,
            'playerDetail' => $this->Players,
        ];

    }
}
