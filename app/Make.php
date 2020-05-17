<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public function vehicleListing()
    {
        return $this->hasOneThrough('App\listing', 'App\vehicle');
    }
    protected $fillable = ['id', 'make'];
}
