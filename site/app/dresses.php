<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dresses extends Model
{
    protected $fillable = [ 'name', 'dress_type','price','color','image','discreption','category_services_id'];
    public function category()
    {
        return $this->belongTo('App\category_services');
    }
    
    public function image_dress()
    {
        return $this->hasMany('App\image_dress');
    }
}
