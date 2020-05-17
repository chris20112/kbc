<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Drive extends JsonResource
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
            'drive_id' => $this->id,
            'drive' => $this->drive
        ];
    }
}
