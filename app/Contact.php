<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function listing(){
        return $this->hasMany('App\Listing', 'contact_id');
    }

    protected $fillable = ['first_name'];
}
