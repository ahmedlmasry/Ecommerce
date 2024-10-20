<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'description');

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}