<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function technician(){
        return $this->hasOne(TechnicianDetails::class);
    }
<<<<<<< Updated upstream
=======

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailQueued);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ForgotPasswordQueued($token));
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function getAuthUser($with=null){
        $query = $this->query();
        if ($with) {
            $query->with($with);
        }
        return $query->find(Auth::id());
    }
>>>>>>> Stashed changes
}
