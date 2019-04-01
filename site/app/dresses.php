<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dresses extends Model
{
    public function category()
    {
        return $this->belongTo('App\category_services');
    }
    public function dress_type()
    {
        return $this->belongsTo('App\dress_type');
    }
    public function image_dress()
    {
        return $this->hasMany('App\image_dress');
    }
}
