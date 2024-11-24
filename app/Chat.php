<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'title'
    ];
    public function users()
    {
        return $this->belongsToMany(Instructor::class, 'chat_user');
    }
    public function messages()
    {
    return $this->hasMany(Message::class,'chat_id');
    }
}
