<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('city_id','email','password','phone','name');

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

}
