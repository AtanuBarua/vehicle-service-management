<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','product_id','review','star','status'];

    const ACTIVE = 1;
    const INACTIVE = 0;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getReviewsByProductId($id){
        return $this->query()->where('product_id',$id)->where('status',self::ACTIVE)->get();
    }
}
