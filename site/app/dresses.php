<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dresses extends Model
{
    protected $fillable = ['id', 'name', 'dress_type_id'];
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
