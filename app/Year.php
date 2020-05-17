<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public function vehicleListing()
    {
        return $this->hasOneThrough('App\listing', 'App\vehicle');
    }
    protected $fillable = ['id', 'year'];
}
