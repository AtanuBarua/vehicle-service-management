<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['order_id','product_id','user_id','price','quantity','subtotal','status','reviewed'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
