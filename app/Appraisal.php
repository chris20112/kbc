<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    public function vehicleListing()
    {
        return $this->hasOneThrough('App\listing', 'App\vehicle');
    }
    protected $fillable = ['id', 'asking_original', 'asking_now', 'date_listed', 'kbb_pp', 'kbb_trade', 'accu_ws', 'accu_truecar', 'vauto_app', 'vauto_sell', 'vauto_ctm', 'vauto_ptm', 'vauto_mds', 'est_recon', 'est_gross', 'user_id'];
}
