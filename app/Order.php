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
<<<<<<< Updated upstream
    
=======

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

    public function createOrder($data){
       return $this->query()->create($data); 
    }

    public function getOrders($with=[],$search=[], $select = '*', $latest = 'id', $paginate=false){
        $query = $this->query();
        if (!empty($with)) {
            $query->with($with);
        }
        $query->select($select);
        if ($paginate) {
            $result = $query->latest($latest)->paginate($search['paginate']);
        }
        else{
            $result = $query->latest($latest)->get();
        }
        return $result;
    }    
>>>>>>> Stashed changes
}
