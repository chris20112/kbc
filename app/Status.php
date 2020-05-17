<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function listing(){
        return $this->belongsTo('App\Listing', 'status_id');
    }
    protected $fillable = ['id', 'status'];
}
