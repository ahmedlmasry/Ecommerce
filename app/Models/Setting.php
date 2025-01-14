<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about_app', 'email', 'phone', 'fb_link', 'tw_link', 'inst_link');

}
