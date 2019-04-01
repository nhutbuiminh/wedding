<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wedding_services extends Model
{
    public function category()
    {
        return $this->belongTo('App\category_services');
    }
    public function detail_services()
    {
        return $this->hasMany('App\detail_wedding');
    }
}
