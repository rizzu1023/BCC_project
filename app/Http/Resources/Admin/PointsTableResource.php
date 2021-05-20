<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PointsTableResource extends JsonResource
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
            'group_name' => $this->group_name,
            'group_teams' => $this->Teams ? GroupTeamResource::collection($this->Teams) : NULL,
        ];
    }
}
