<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

use DB;
use Hash;
use Mail;
use Crypt;
use Session;
use App\City;
use App\Category;
use App\Course;
use App\Video;
use App\Introduction;
use App\User;
use App\Setting;
use App\Slider;
use App\Courses_joined;
use Illuminate\Support\Str;
use App\Visit;
use App\Http\Resources\CourseResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\VideoResource;
use App\Http\Resources\InstructorResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\BannerResource;
use App\Http\Resources\SocialResource;

use App\Instructor;
use App\Notice;
use App\Banner;
use App\Inquiry;
use App\Social;


class HomeController extends Controller
{
    use GeneralTrait;
    public function cities(Request $request)
    {
        $cities = City::get();
        foreach ($cities as $item) {
            $count = Product::where('city_id',$item->id)->get();
            $item->product_count=count($count);
        }
        return $this -> returnDataa(
            'data',$cities,''
        );
    }

    public function categotries(Request $request)
    {
        $categotries = Category::selection()->get();

        return $this -> returnDataa(
            'data',$categotries,''
        );
    }
    public function courses(Request $request)
    {

        if($request->category_id){
            $courses = Course::with('course_instructor')
                ->with('categories')
                ->with('course_requirements')
                ->with('course_subtitle')
                ->with('user_courses_joined')
                ->with('user_joined')->selection()->where('category_id',$request->category_id)->get();
        }elseif($request->title){
            $courses = Course::with('course_instructor')
                ->with('categories')
                ->with('course_requirements')
                ->with('course_subtitle')
                ->with('user_courses_joined')
                ->with('user_joined')->selection()->where('title_ar', 'LIKE', $request->title.'%')->orWhere('title_en', 'LIKE', $request->title.'%')->get();
        }else{
            $courses = Course::with('course_instructor')
                ->with('categories')
                ->with('course_requirements')
                ->with('course_subtitle')
                ->with('user_courses_joined')
                ->with('user_joined')->selection()->get();
        }
        // return $this -> returnDataa(
        //     'data',$courses,''
        // );
        return $this -> returnDataa(
            'data',CourseResource::collection($courses),''
        );
    }

    public function home(Request $request)
    {
        $courses = Course::with('course_instructor')
            ->with('categories')
            ->with('course_requirements')
            ->with('course_subtitle')
            ->with('user_courses_joined')
            ->with('user_joined')->selection()->latest()->take(20)->get();
        $sliders = Slider::get();
        $banners = Banner::get();
        $introductions = Introduction::selection()->get();
        $videos = Video::selection()->get();
        $data  =[
            'courses'=>CourseResource::collection($courses),
            'sliders'=>SliderResource::collection($sliders),
            'introductions'=>$introductions,
            'videos'=>VideoResource::collection($videos),
            'banners'=>BannerResource::collection($banners)
        ];
        return $this -> returnDataa(
            'data',$data,''
        );
    }

    public function coursesUser(Request $request)
    {
        $userid = Auth::guard('instructors-api')->user();
        if(!$userid)
            return $this->returnError(__('front.You must login first'));
        $courses_joined = Courses_joined::where('student_id',$userid->id)->latest()->get();
        $courses=[];
        foreach ($courses_joined as $item) {
            $course = Course::with('course_instructor')
                         ->with('categories')
                         ->with('course_requirements')
                         ->with('course_subtitle')
                         ->with('user_courses_joined')
                         ->with('user_joined')
                         ->selection()
                         ->where('id',$item->course_id)
                         ->first();

            if($course)
                $courses[]=$course;
        }
        return $this -> returnDataa(
            'data',CourseResource::collection($courses),''
        );
    }
    public function coursesDetais(Request $request)
    {
        $course = Course::with('course_instructor')
                         ->with('categories')
                         ->with('course_requirements')
                         ->with('course_subtitle')
                         ->with('user_courses_joined')
                         ->with('user_joined')
                         ->selection()
                         ->where('id',$request->course_id)
                         ->first();

        if(!$course)
            return $this -> returnError('','not found');
        // $user = Auth::guard('instructors-api')->user();
        // if($user){
        //     $user_joined = Courses_joined::where("student_id" , $user->id)->where("course_id" ,$request->course_id)->first();
        // }else{
        //     $user_joined=null;
        // }
        // $data  =[
        //     'details'=>new CourseResource($course),
        //     'user_joined'=>$user_joined,
        // ];
        return $this -> returnDataa(
            'data',new CourseResource($course),''
        );
    }
    public function joinedCourses(Request $request)
    {
        $userid = Auth::guard('instructors-api')->user();
        if(!$userid)
            return $this->returnError(__('front.You must login first'));
        $add=new Courses_joined;
        $add->student_id=$userid->id;
        $add->instructor_id=$request->instructor_id;
        $add->course_id=$request->course_id;
        $add->status=1;
        $add-> save();
        return $this -> returnSuccessMessage('successfully sent');
    }
    public function getInstructor(Request $request)
    {
       $user = Instructor::where('type' ,'instructor')->get();
        return $this -> returnDataa(
            'data',InstructorResource::collection($user),''
        );
    }
    public function notices(Request $request)
    {
        $user = Auth::guard('instructors-api')->user();
        if(!$user)
            return $this->returnError(__('front.You must login first'));
        $data = Notice::selection()->where('student_id' ,$user->id)->get();
        return $this -> returnDataa(
            'data',$data,''
        );
    }

    public function settings(Request $request)
    {
        $settings = Setting::selection()->first();
        // $socials = Social::get();
        // $data  =[
        //     'settings'=>new SettingResource($settings) ,
        //     'socials'=> SocialResource::collection($socials)
        // ];
        return $this -> returnDataa(
            'data',new SettingResource($settings),''
        );
    }
    public function inquiries(Request $request)
    {

        $add=new Inquiry;
        $add->name=$request->name;
        $add->mail=$request->mail;
        $add->message=$request->message;
        $add-> save();
        return $this -> returnSuccessMessage('successfully sent');
    }

}
