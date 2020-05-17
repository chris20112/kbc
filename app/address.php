<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    public function contactListing()
    {
        return $this->hasOneThrough('App\listing', 'App\Contact');
    }
    protected $fillable = ['id', 'street_1', 'street_2', 'city', 'state', 'zip'];
}
