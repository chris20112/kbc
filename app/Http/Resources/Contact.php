<?php

namespace App\Http\Resources;

use App\Http\Resources\Address as AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{

    public function toArray($request)
    {

        return [

        //'contact_id' => $this->id,
        'first_name' => $this->first_name,
        'last_name' => $this->last_name,
        'phone_1' => $this->phone_1,
        'phone_2' => $this->phone_2,
        'email_1' => $this->email_1,
        'email_2' => $this->email_2,
        //'street' => \App\address::find($this->address_id)->street_1,
        //'city' => \App\address::find($this->address_id)->city,
        //'state' => \App\address::find($this->address_id)->state,
        //'zip' => \App\address::find($this->address_id)->zip
        //'make' => new MakeResource(\App\Make::find($this->make_id)
        //'city' => \App\Contact::find($this->contact_id)->address_id,
        ];
    }

    public function with($request){

        return [

            'version' => '1.0.0',
            'author_url' => url('http://autofollowup.net')

        ];

    }
}
