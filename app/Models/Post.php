<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('client_id');

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}