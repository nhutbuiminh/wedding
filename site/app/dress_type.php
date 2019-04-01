<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dress_type extends Model
{
    public function dress()
    {
        return $this->hasMany('App\dresses');
    }
}
