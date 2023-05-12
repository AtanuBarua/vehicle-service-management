<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','shipping_address_id','billing_address_id','payment_id','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }

    public function shippingAddress(){
        return $this->hasOne(Address::class,'id','shipping_address_id');
    }

    public function billingAddress(){
        return $this->hasOne(Address::class,'id','billing_address_id');
    }

    
}
