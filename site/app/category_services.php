<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_services extends Model
{
    protected $fillable = ['id', 'name'];
    public function dress()
    {
        return $this->hasOne('App\dresses');
    }
    public function photography()
    {
        return $this->hasOne('App\photography_services');
    }
    public function weddding()
    {
        return $this->hasOne('App\wedding_services');
    }
}
