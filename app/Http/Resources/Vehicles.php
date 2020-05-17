<?php

namespace App\Http\Resources;

use App\Http\Resources\Year as YearResource;
use App\Http\Resources\Make as MakeResource;
use App\Http\Resources\Vehicle_model as Vehicle_modelResource;
use App\Http\Resources\Trim as TrimResource;
use App\Http\Resources\Drive as DriveResource;
use App\Http\Resources\Transmission as TransmissionResource;
use App\Http\Resources\Color as ColorResource;
use App\Http\Resources\Appraisal as AppraisalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Vehicles extends JsonResource
{

    public function toArray($request)
    {
        return [
        'vehicle_id' => $this->id,
        'vin' => $this->vin,
        'odometer' => $this->odometer,
        'notes' => $this->notes,
        'year' => new YearResource(\App\Year::find($this->year_id)),
        'make' => new MakeResource(\App\Make::find($this->make_id)),
        'model' => new Vehicle_modelResource(\App\Vehicle_model::find($this->model_id)),
        'trim' => new TrimResource(\App\Trim::find($this->trim_id)),
        'drive' => new DriveResource(\App\Drive::find($this->drive_id)),
        'transmission' => new TransmissionResource(\App\Transmission::find($this->transmission_id)),
        'color' => new ColorResource(\App\Color::find($this->color_id)),
        'appraisal' => new AppraisalResource(\App\Appraisal::find($this->appraisal_id))




    ];
    }
}
