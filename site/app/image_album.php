<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_album extends Model
{
    protected $fillable = [ 'image','photography_services_id'];
    public function photography_services()
    {
        return $this->belongTo('App\photography_services');
    }
}
