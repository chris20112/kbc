<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vehicle extends JsonResource
{

    public function toArray($request)
    {
        return [

            'vin' => $this->vin,
            'odometer' => $this->odometer,
            'notes' => $this->notes,



        ];
    }
    public function with($request){

        return [

            'version' => '1.0.0',
            'author_url' => url('http://autofollowup.net')

        ];

    }
}
