<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Technician extends Authenticatable
{
    //
    use Notifiable;
    
    protected $guard = 'technician';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'region_id', 'city_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}