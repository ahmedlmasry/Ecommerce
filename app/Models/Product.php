<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'price', 'image', 'description', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

}