<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Appraisal extends JsonResource
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

            'appraisal_id' => $this->id,
            'appraised_by' => $this->user_id,
            'asking_original' => $this->asking_original,
            'asking_now' => $this->asking_now,
            'date_listed' => $this->date_listed,
            'kbb_pp' => $this->kbb_pp,
            'kbb_trade' => $this->kbb_trade,
            'accu_ws' => $this->accu_ws,
            'accu_truecar' => $this->accu_truecar,
            'vauto_app' => $this->vauto_app,
            'vauto_sell' => $this->vauto_sell,
            'vauto_ctm' => $this->vauto_ctm,
            'vauto_ptm' => $this->vauto_ptm,
            'vauto_mds' => $this->vauto_mds,
            'est_recon' => $this->est_recon,
            'est_gross' => $this->est_gross,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
