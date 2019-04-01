<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_dress extends Model
{
    public function dresses()
    {
        return $this->belongTo('App\dresses');
    }
}
