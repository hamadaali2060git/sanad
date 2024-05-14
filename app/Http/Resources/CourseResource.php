<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        if($this->video){
            return [
                'id'=>$this->id,
                'user_id'=>$this->user_id,
                'category_id'=>$this->category_id,
                'title'=>$this->title,
                'slug'=>$this->slug,
                'description'=>$this->description,
                'date'=>$this->date,
                'time'=>$this->time,
                'duration'=>$this->duration,
                'language'=>$this->language,
                'payed'=>$this->payed,
                'price'=>$this->price,
                'currency'=>__('front.currency'),
                'image'=>url('/img/courses/' . $this->image),
                'video'=>url('/img/courses/video/' . $this->video),
                'meeting_url'=>$this->meeting_url,
                'instructor'=>$this->course_instructor,
                'instructor_image'=>url('/img/profiles/'.$this->course_instructor->photo),
                'categories'=>$this->categories,
                'requirements'=>$this->course_requirements,
                'subtitle'=>$this->course_subtitle,
                'course_joined'=>count($this->user_courses_joined),
                'user_joined'=>  (count($this->user_joined) >=1)  ? true : false,
                // 'user_joinede'=> $this->user_joined
            ];
        }else{
            return [
                'id'=>$this->id,
                'user_id'=>$this->user_id,
                'category_id'=>$this->category_id,
                'title'=>$this->title,
                'slug'=>$this->slug,
                'description'=>$this->description,
                'date'=>$this->date,
                'time'=>$this->time,
                'duration'=>$this->duration,
                'language'=>$this->language,
                'payed'=>$this->payed,
                'price'=>$this->price,
                'currency'=>__('front.currency'),
                'image'=>url('/img/courses/' . $this->image),
                'video'=>$this->video,
                'meeting_url'=>$this->meeting_url,
                'instructor'=>$this->course_instructor,
                'instructor_image'=>url('/img/profiles/'.$this->course_instructor->photo),
                'categories'=>$this->categories,
                'requirements'=>$this->course_requirements,
                'subtitle'=>$this->course_subtitle,
                'course_joined'=>count($this->user_courses_joined),
                'user_joined'=>  (count($this->user_joined) >=1)  ? true : false,
                // 'user_joinede'=> $this->user_joined
            ];
        }
    }
}
