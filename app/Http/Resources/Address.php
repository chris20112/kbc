<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Address extends JsonResource
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

            'address_id' => $this->id,
            'street_1' => $this->street_1,
            'street_2' => $this->street_2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip
        ];
    }

}
