<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','amount','payment','paid','region_id','city_id','address','name','email','phone','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
