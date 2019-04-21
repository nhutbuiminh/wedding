<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oder extends Model
{
    protected $filable = ['customer_name', 'email', 'address', 'phone', 'message'];
    protected $table = 'oders';
    
}
