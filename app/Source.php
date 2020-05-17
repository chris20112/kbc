<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public function listing(){
        return $this->belongsTo('App\Listing', 'source_id');
    }
}
