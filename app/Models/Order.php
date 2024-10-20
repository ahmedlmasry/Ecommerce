<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('client_id','total_price','note','address');

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')
            ->withPivot('quantity','price','special_note');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
