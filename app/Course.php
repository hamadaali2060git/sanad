<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Course extends Model
{
    protected $table = 'courses';
    
    public function course_requirements()
    {
      return $this->hasMany(CourseRequirement::class,'course_id','id')->selection();
    }
    public function course_subtitle()
    {
      return $this->hasMany(SubTitle::class,'course_id','id')->selection();
    }
    public function user_courses_joined()
    {
      return $this->hasMany(Courses_joined::class,'course_id','id');
    }
    // public function user_joined()
    // {
    //   return $this->hasMany(Courses_joined::class,'course_id','id');
    // }
    public function user_joined()
    {
      $student_auth=Auth::guard('instructors-api')->user();
      if($student_auth){
        return $this->hasMany(Courses_joined::class,'course_id','id')->where('student_id',$student_auth->id);
      }else{
        return $this->hasMany(Courses_joined::class,'course_id','id')->where('student_id',0);
      }
      
      // return $this->hasOne('App\Follow')->where('user_id', Auth::user()->id);
    }
    
    public function categories() {
        return $this->belongsTo(Category::class,"category_id","id")->selection();
    }
    public function course_instructor() {
      return $this->belongsTo(Instructor::class,"user_id","id")->selection();

    }

    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
            'user_id',
            'category_id',
        	  'title_' . app()->getLocale() . ' as title',
            'slug_' . app()->getLocale() . ' as slug',
            'description_' . app()->getLocale() . ' as description',
            'date',
            'time',
            'duration',
            'language',
            'payed',
            'price',
            'image',
            'video',
            'meeting_url'
            

        );
    }
}
