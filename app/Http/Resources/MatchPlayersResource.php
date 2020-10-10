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
            'player_id' => $this->player_id,
            'match_id' => $this->match_id,
            'team_id' => $this->team_id,
            'bt_status' => $this->bt_status,
            'bt_runs' => $this->bt_runs,
            'bt_balls' => $this->bt_balls,
            'bt_fours' => $this->bt_fours,
            'bt_sixes' => $this->bt_sixes,
            'bt_order' => $this->bt_order,
            'bw_status' => $this->bw_status,
            'bw_over' => $this->bw_over,
            'bw_overball' => $this->bw_overball,
            'bw_wickets' => $this->bw_wickets,
            'bw_runs' => $this->bw_runs,
            'bw_nb' => $this->bw_nb,
            'bw_maiden' => $this->bw_maiden,
            'bw_nb' => $this->bw_nb,
            'wicket_type' => $this->wicket_type,
            'wicket_primary' => $this->wicket_primary,
            'wicket_secondary' => $this->wicket_secondary,
            'tournament_id' => $this->tournament_id,
            'playerDetail' => $this->Players,
            'wicketPrimary' => $this->wicketPrimary,
            'wicketSecondary' => $this->wicketSecondary,
        ];

    }
}
