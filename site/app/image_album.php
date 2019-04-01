<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_album extends Model
{
    public function photography_services()
    {
        return $this->belongTo('App\photography_services');
    }
}
