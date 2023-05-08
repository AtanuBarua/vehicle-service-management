<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicianDetails extends Model
{
    protected $fillable = ['user_id','availability','slot','queue'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
