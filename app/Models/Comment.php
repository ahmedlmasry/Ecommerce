<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = ['body','post_id','user_id'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

}
