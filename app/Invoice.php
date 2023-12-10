<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
<<<<<<< Updated upstream
    //
=======
    protected $fillable = ['order_id','product_id','user_id','price','quantity','subtotal','status','reviewed'];

    const ACTIVE = 1;
    const INACTIVE = 0;
    const REVIEWED_NO = 0;
    const REVIEWED_YES = 0;

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function getReviewer($user_id, $product_id){
        $query = self::query();
        return $query->where('user_id',$user_id)->where('product_id',$product_id)->where('status',self::ACTIVE)->where('reviewed', self::REVIEWED_NO)->latest()->first();
    }

    public function createInvoice($data){
        return $this->create($data);
    }
>>>>>>> Stashed changes
}
