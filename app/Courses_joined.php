<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses_joined extends Model
{
    protected $table = 'courses_joined';

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id')->selection();
    }
    
   
}
