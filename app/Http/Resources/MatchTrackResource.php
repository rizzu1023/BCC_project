<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchTrackResource extends JsonResource
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
            'attacker_id' => $this->Players,
            'over_no' => $this->over_no,
            'runs' => $this->runs,
            'wickets' => $this->wickets,
        ];
    }
}
