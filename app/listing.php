<?php

namespace App;

use App\CustomCollection;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    public function contact(){

        return $this->hasOne('App\Contact', 'contact_id');
    }
    public function vehicle(){

        return $this->hasOne('App\Vehicle', 'id');
    }
    public function source(){

        return $this->hasOne('App\Source', 'id');
    }
    public function status(){

        return $this->hasOne('App\Status', 'id');
    }
    public function color(){

        return $this->hasOne('App\Status', 'id');
    }
    protected $fillable = ['contact_id', 'vehicle_id'];

}


