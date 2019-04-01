<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_wedding extends Model
{
    public function wedding_services()
    {
        return $this->belongTo('App\wedding_services');
    }
}
