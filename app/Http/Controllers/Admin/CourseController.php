<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Course;
use App\Category;
use Illuminate\Http\Request;
use Auth;
use App\Instructor;
use Illuminate\Support\Str;
use App\Courses_joined;
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(Auth::guard('instructors')->user());
        // $this->middleware('permission:specialities', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories=Category::all();
        $courses=Course::with('course_instructor')
        ->with('categories')
        ->with('course_requirements')
        ->with('course_subtitle')->orderBy('id', 'DESC')->get();

        return view('admin.courses.all',compact('courses','categories'));
    }
    
     public function updateStatus(Request $request)
    {
        $straight = Course::findOrFail($request->id);
        $straight->status = $request->status;
        $straight->save();
        return back()->with("message", 'تم تغيير الحالة '); 
        // return response()->json(['message' => 'User status updated successfully.']);
    }
    public function courseFilter(Request $request)
    {
        // $categories=Category::orderBy('id', 'DESC')->get();
        $courses = Course::where('status',$request->filter)->orderBy('id', 'DESC')->get();
        foreach ($courses as $item) {   
            $item->instructor= Instructor::where('id',$item->userId)->first();
        }
        return view('admin.courses.all',compact('courses'));
    }
    
    public function create()
    {
        $categories=Category::all();    
        return view('instructor.livecourses.create',compact('categories'));
    }
    
    
    
    // public function store(Request $request)
    // { 
    //     $userid = Auth::guard('instructors')->user();
    //     $file_extension = $request -> file('image') -> getClientOriginalExtension();
    //     $file_name = time().'.'.$file_extension;
    //     $file_nameone = $file_name;
    //     $path = 'assets_admin/img/livecourses';
    //     $request-> file('image') ->move($path,$file_name);

    //     $add = new Straight;
        
    //     $add->userId    = $userid->id;
    //     $add->title    = $request->title;
    //     $add->short_detail    = $request->short_detail;
    //     $add->detail    = $request->detail;
    //     $add->image    = $file_name;
    //     $add->save();
    //     $length = count($request->sessiontitle);
    //     if($length > 0)
    //     {
    //         for($i=0; $i<$length; $i++)
    //         {
    //             $add_lecture = new Lecture;
    //             $add_lecture->liveId    = $add->id;
    //             $add_lecture->title    = $request->sessiontitle[$i];
    //             $add_lecture->date    = $request->sessiondate[$i];
    //             $add_lecture->time    = $request->time[$i];
    //             $add_lecture->duration    = $request->sessionduration[$i];
    //             $add_lecture->url    = $request->url[$i];
    //             $add_lecture->meeting_password    = $request->meeting_password[$i];
    //             $add_lecture->meeting_id    = $request->meeting_id[$i];
    //             $add_lecture->save();
    //         }
             
    //     }
    //     return redirect()->back()->with("message", 'تم الإضافة بنجاح'); 
    // }
    public function coursesEdit($id)
    {
        // dd('dddd');
        $edit = Course::findOrFail($id);
        $categories=Category::all();
        return view('admin.courses.edit',compact('edit','categories'));
    }

    public function update(Request $request)
    {
        // $this->validate( $request,[          
        //         'title'=>'required',
        //         'short_detail'=>'required',
        //         'detail'=>'required',
        //         'price'=>'required',
        //         'date'=>'required',
        //         'time'=>'required',
        //         'duration'=>'required',
        //         'payed'=>'required',
        //         'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        //     ],
        //     [
        //         'title.required'=>' العنوان مطلوب ',   
        //         'short_detail.required'=>' يرجى كتابة وصف قصير ',
        //         'detail.required'=>' يرجي كتابة تفاصيل الكورس',
        //         'price.required'=>' سعر الكورس مطلوب ',
        //         'date.required'=>' المستوى مطلوب ',
        //         'time.required'=>' يرجى كتابة متطلبات الكورس ',
        //         'duration.required'=>' مدة الكورس مطلوبة ',
        //         'payed.required'=>' ادخل بعض الكلامات الدلالية ',
        //         'image.required'=>' يرجي إختيار صورة jpeg,jpg,png,gif ',
        //     ]
        // );
        $userid = Auth::guard('instructors')->user();
        $date = date('Y-m-d');
        $edit = Course::findOrFail($request->id);
        if($file=$request->file('image'))
        {
            $file_extension = $request -> file('image') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/courses';
            $request-> file('image') ->move($path,$file_name);
            $edit->image  = $file_nameone;
        }else{
            $edit->image  = $edit->image;
        }
        $edit->title    = $request->title;
        $edit->title_ar    = $request->title_ar;
        $edit->short_detail    = $request->short_detail;
        $edit->target_group    = $request->target_group;
        $edit->mahawir    = $request->mahawir;
        $edit->date    = $request->date;
        $edit->time    = $request->time;
        $edit->duration    = $request->duration;
        $edit->slug =Str::slug($request->title, '-', Null);
        $edit->payed    = $request->payed;
        if($request->price){
            $edit->price    = $request->price;
        }else{
            $edit->price= 0;
        }
        $edit->meeting_url    = $request->meeting_url;
        $edit->meeting_password    = $request->meeting_password;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح'); 
    }



    public function destroy(Request $request )
    {
        $delete = Straight::findOrFail($request->id);
        if($delete){
            $courses_joined= Courses_joined::where('liveId',$delete->id)->get();
            foreach ($courses_joined as $item) {         
                $delete_course = Courses_joined::findOrFail($item->id);
                $delete_course->delete();
            }
        }
        $delete->delete();
        return back()->with("message",'تم الحذف بنجاح'); 
    } 
    public function courseJoined($id)
    {
        $course=Course::find($id);
        
        $course_joined = Courses_joined::where("course_id" , $id)->get();
        foreach ($course_joined as $_item) {
             $instructor= Instructor::where('id',$_item->student_id)->first();
            if($instructor){
                 $_item->instructor=$instructor;
            }
        }
        // dd($subscriptions);
        return view('admin.courses.course-joined',compact('course_joined','course'));
    }
}