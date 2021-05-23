<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayingXIResource extends JsonResource
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
            'player_id' => $this->player_id,
            'player_name' => $this->first_name.' '.$this->last_name,
            'isChecked' => false,
        ];
    }
}
