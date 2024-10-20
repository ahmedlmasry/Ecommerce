<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{

    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = array('order_id', 'payment_method', 'payment_status', 'amount');

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

}