<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}