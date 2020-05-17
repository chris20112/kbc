<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function vehicleListing()
    {
        return $this->hasManyThrough('App\listing', 'App\vehicle');
    }
    protected $fillable = ['id', 'color'];
}
