<?php

namespace App\Http\Resources;

use App\Http\Resources\Vehicles as VehicleResource;
use App\Http\Resources\Contact as ContactResource;
use App\Http\Resources\Status as StatusResource;
use App\Http\Resources\Source as SourceResource;
use App\Http\Resources\Address as AddressResource;
use App\Http\Resources\Year as YearResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Listing extends JsonResource
{

    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'source' => new SourceResource(\App\Source::find($this->source_id)),
            'link_url' => $this->link_url,
            'status' => new StatusResource(\App\Status::find($this->status_id)),
            'listing_notes' => $this->notes,
            //'contact_id' => $this->contact_id,
            'contact' => new ContactResource(\App\Contact::find($this->contact_id)),
            //'vehicle_id' => $this->vehicle_id,
            //'address_id' => \App\Contact::find($this->contact_id)->address_id,
            'address' => new AddressResource(\App\address::find(\App\Contact::find($this->contact_id)->address_id)),
            'vehicle' => new VehicleResource(\App\Vehicle::find($this->vehicle_id)),
            //'year' => new YearResource(\App\Year::find(\App\Vehicle::find($this->vehicle_id)->year_id)),


        );
    }
    public function with($request){

        return [

            'version' => '1.0.0',
            'author_url' => url('http://autofollowup.net')

        ];

    }
}
