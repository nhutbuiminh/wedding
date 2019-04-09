<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_album extends Model
{
    protected $fillable = ['id', 'name', 'image','photography_service_id'];
    public function photography_services()
    {
        return $this->belongTo('App\photography_services');
    }
}
