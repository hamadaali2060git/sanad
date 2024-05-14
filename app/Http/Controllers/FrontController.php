<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Slider;
use App\Course;
use App\Category;
use App\Courses_joined;
use App\Instructor;
use App\Setting;
use Hash;
use App\Http\Resources\CourseResource;
use App\Rules\ReCaptcha;

class FrontController extends Controller
{
    public function contactForm()
    {
        return view('front.contact-form');
    }
    public function capthcaFormValidate(Request $request)
    {
        // $request->validate([

        //     'captcha' => 'required|captcha'
        // ]);
        $this->validate(request(),[
            'captcha' => 'required|captcha'
        ],
        [
            'captcha.required'=>'captcha مطلوبه',
            'captcha.captcha'=>'captcha خطأ ',
        ]
    );


    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $input = $request->all();

        dd($input);

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
    public function index()
    {
        $isLogedin = Auth::guard('instructors')->user();
        $sliders=Slider::all();
        $courses=Course::where('status',1)->get();
        $categories = Category::with('courses')->has('courses')->get();
        // dd($categories);

        return view('front.home',compact('isLogedin','sliders','courses','categories'));
    }

    public function coursesBycategory($slug)
    {
        $isLogedin = Auth::guard('instructors')->user();
        $category = Category::where('slug',$slug)->first();
        if($category){
        $courses=Course::where('status',1)->where('category_id',$category->id)->get();
        }else {
          $courses=[];
        }
        return view('front.courses',compact('isLogedin','courses','category'));
    }

    public function coursesDetails($slug ,$id)
    {
        $course = Course::with('course_instructor')
        ->with('categories')
        ->with('course_requirements')
        ->with('course_subtitle')
        ->with('user_courses_joined')
        ->with('user_joined')
        ->selection()
        ->where('id',$id)
        ->first();

        // $course = new CourseResource($details);
        // return $course;
        // dd($course);
        return view('front.course-details',compact('course'));
    }
    public function myProfile()
    {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');
        if($user->type=="instructor")
            return redirect('/');
        return view('front.myprofile',compact('user'));
    }
    public function myCourses()
    {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');
        if($user->type=="instructor")
            return redirect('/');



        $courses_joined = Courses_joined::where('student_id',$user->id)->latest()->get();
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

        return view('front.mycourses',compact('user','courses'));
    }
    public function instructors()
    {
        $instructors = Instructor::where('type','instructor')->get();
        return view('front.instructors',compact('instructors'));
    }
    public function about()
    {
        $setting = Setting::first();
        return view('front.about',compact('setting'));
    }
    public function policy()
    {
        return view('front.policy');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function updateProfile(Request $request)
    {

            $userid = Auth::guard('instructors')->user();
            if(!$userid)
                return redirect('user-login');
            if($userid->type=="instructor")
                return redirect('/');

            $edit = instructor::findOrFail($userid->id);
            if($file=$request->file('photo'))
            {
                $file_extension = $request -> file('photo')->getClientOriginalExtension();
                $file_name = time().'.'.$file_extension;
                $file_nameone = $file_name;
                $path = 'img/profiles/students';
                $request-> file('photo') ->move($path,$file_name);
                $edit->photo  = $file_nameone;
            }else{
                $edit->photo  = $edit->photo;
            }

            if(isset($request->first_name) && isset($request->last_name)){
                $edit->name  = $request->first_name .' '. $request->last_name;
            }else{
                $edit->name  = $edit->name;
            }
            if(isset($request->first_name)){
                $edit->first_name  = $request->first_name;
            }else{
                $edit->first_name  = $edit->first_name;
            }
            if(isset($request->last_name)){
                $edit->last_name  = $request->last_name;
            }else{
                $edit->last_name  = $edit->last_name;
            }
            if(isset($request->mobile)){
                $edit->mobile  = $request->mobile;
            }else{
                $edit->mobile  = $edit->mobile;
            }
            if(isset($request->detail)){
                $edit->detail  = $request->detail;
            }else{
                $edit->detail  = $edit->detail;
            }

            $edit->save();
// dd('fdd');
            return back()->with("message", 'تم التعديل بنجاح');
        }

    public function studentPassword()
    {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');
        if($user->type=="instructor")
            return redirect('/');

        return view('front.student-password',compact('user'));
    }
    public function studentChangePassword(Request $request){
        $user= Auth::guard('instructors')->user();
        // $this->validate($request, [
        //     'current-password'     => 'required',
        //     'new-password'     => 'required',
        //     // 'confirm_password' => 'required|same:new_password',
        // ]);

        $this->validate( $request,[
                'current-password'=>'required',
                'new-password'=>'required',
            ],
            [
                'current-password'=>'required',
                'new-password'=>'required',
            ]
        );

        // dd('ugutg');
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            return redirect()->back()->with("errorss","كلمة المرور الحالية لا تتطابق مع كلمة المرور التي قدمتها. حاول مرة اخرى.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("errorss","لا يمكن أن تكون كلمة المرور الجديدة هي نفسها كلمة مرورك الحالية. الرجاء اختيار كلمة مرور مختلفة.");
        }
        // dd('veferfrr');

        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("message","تم تغيير الرقم السري بنجاح !");
    }


}
