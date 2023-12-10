<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const TYPE_COD = 1;
    const TYPE_CARD = 2;

    protected $fillable = ['order_id','amount','payment_method'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function createPayment($data){
        return $this->query()->create($data);
    }
}
