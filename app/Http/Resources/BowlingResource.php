<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BowlingResource extends JsonResource
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
            'playerDetail' => $this->Players,
            'bw_matches' => $this->bw_matches,
            'bw_innings' => $this->bw_innings,
            'bw_balls' => $this->bw_balls,
            'bw_wickets' => $this->bt_wickets,
        ];
    }
}
