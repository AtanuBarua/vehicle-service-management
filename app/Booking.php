<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id','technician_id','service_id','region_id','city_id','date','time','name','email','phone','is_reminded','status'];

    public const PENDING = 1;
    public const PROCESSING = 2;
    public const DELIVERED = 4;
    public const CANCELLED = 5;
    public const IS_REMINDED_TRUE = "1";
    public const IS_REMINDED_FALSE = "0";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function technician(){
        return $this->belongsTo(Technician::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function saveBooking($data, $id){
        return $this->where('id',$id)->update($data);
    }

}
