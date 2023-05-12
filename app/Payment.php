<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id','amount','payment_method'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
