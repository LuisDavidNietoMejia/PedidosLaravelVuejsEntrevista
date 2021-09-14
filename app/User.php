<?php

namespace PedidosLaravelVue;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

// implements JWTSubject
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
         'name','last_name','email','password'
     ];

    protected $hidden = [
         'password', 'remember_token','pivot','id'
    ];

    protected $casts = [
         'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
