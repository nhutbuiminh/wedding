<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_wedding extends Model
{
    protected $fillable = ['id', 'name', 'detail','service_id'];
    public function wedding_services()
    {
        return $this->belongTo('App\wedding_services');
    }
}
