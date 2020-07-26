<?php

namespace App\Http\Resources;

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
        $start_date = date('d M', strtotime($this->start_date));
        $end_date = date('d M', strtotime($this->end_date));
        return [
            'tournament_name' => $this->tournament_name,
            'start_date' => $start_date,
            'end_date' => $end_date,

        ];
    }
}
