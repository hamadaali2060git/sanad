<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    protected $table = 'chat_user';

    public function user()
    {
        return $this->belongsTo(Instructor::class,'instructor_id');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class,'chat_id');
    }
}
