<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_dress extends Model
{
    protected $fillable = ['image','dress_id'];
    public function dresses()
    {
        return $this->belongTo('App\dresses');
    }
}
