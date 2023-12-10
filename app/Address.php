<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Address extends Model
{
    protected $fillable = ['user_id','location_id','address','full_name','phone','default_shipping_address','default_billing_address'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function getDefaultShippingAddress(){
        return $this->query()->where('user_id',Auth::id())->where('default_shipping_address',1)->first();
    }

    public function getDefaultBillingAddress(){
        return $this->query()->where('user_id',Auth::id())->where('default_billing_address',1)->first();
    }

    public function getAddressesOfAuthUser(){
        return $this->query()->where('user_id',Auth::id())->get();
    }

}
