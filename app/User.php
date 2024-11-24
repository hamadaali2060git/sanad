<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
// use IvanoMatteo\LaravelDeviceTracking\Traits\UseDevices;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;
    
    
    protected $fillable = [
        'name', 'email', 'password','roles_name','Status'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name'=>'array'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    
    public function getJWTCustomClaims()
    {
        return [];
    }
}
