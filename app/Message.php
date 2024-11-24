<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'instructor_id',
        'message',
        // أضف أي أعمدة أخرى تريد السماح بتعيينها بشكل جماعي
    ];
    public function chat()
    {
        return $this->belongsTo(Chat::class,'chat_id');
    }

    public function sender()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}

