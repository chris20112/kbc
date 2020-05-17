<?php

namespace App\Http\Resources;

use App\Http\Resources\Year as YearResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Year extends JsonResource
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

            'value' => $this->id,
            'text' => $this->year
        ];
    }
}
