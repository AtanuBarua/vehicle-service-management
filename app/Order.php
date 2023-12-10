<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','amount','payment','paid','region_id','city_id','address','name','email','phone','status'];

    const ORDER_PENDING = 0;
    const ORDER_PROCESSING = 1;
    const ORDER_SHIPPED = 2;
    const ORDER_DELIVERED = 3;
    const ORDER_CANCELLED = 4;

    public function user(){
        return $this->belongsTo(User::class);
    }

}
