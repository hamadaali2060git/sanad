<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class Instructor extends Authenticatable implements JWTSubject
{

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','is_activated','first_name','last_name','mobile','type'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function curriculums()
    {
      return $this->hasMany(Curriculum::class,'instructor_id','id');
    }
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'first_name' . ' as first_name',
        	'last_name' . ' as last_name',
        	'email'. ' as email',
            'name'. ' as name',
        	'mobile'  . ' as mobile',
        	'photo' . ' as photo',
        	'detail'  . ' as detail',
        );
    }


    public function chats()
    {
        return $this->belongsToMany(Chat::class, 'chat_user');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
}
