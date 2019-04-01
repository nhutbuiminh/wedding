<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photography_services extends Model
{
    public function category()
    {
        return $this->belongTo('App\category_services');
    }
    public function album()
    {
        return $this->hasMany('App\image_album');
    }
}
