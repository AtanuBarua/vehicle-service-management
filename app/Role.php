<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public const IS_ADMIN = 1;
    public const IS_USER = 2;
    public const IS_TECHNICIAN = 3;
}
