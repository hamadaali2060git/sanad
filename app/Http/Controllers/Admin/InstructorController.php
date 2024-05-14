<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use App\Course;
use App\Video;
use App\Bank;
use Auth;
use App\Country;
use App\City;
use App\Review;
use App\Straight;
use App\Courses_joined;
use Mail;
use App\Wallet;
use Illuminate\Support\Facades\File;
class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allEmails()
    {
        $instructors=Instructor::where('type','instructor')->orderBy('id', 'DESC')->get();
        return view('admin.instructors.allemails',compact('instructors'));
    }
    public function index()
    {
        $instructors=Instructor::where('type','instructor')->orderBy('id', 'DESC')->get();
        foreach ($instructors as $items) {
            $items->course_count=Course::where('user_id',$items->id)->count();
            // $items->wallet_total=Wallet::where('user_id',$items->id)->first();
        }
        // dd($instructors);
        return view('admin.instructors.all',compact('instructors'));
    }
    public function instructorFilter(Request $request)
    {
        if($request->filter=="status"){
            $instructors = Instructor::where('type','instructor')->where('status',1)->orderBy('id', 'DESC')->get();
            foreach ($instructors as $item) {   
                $item->course_count=Course::where('userId',$item->id)->count();
                $item->wallet_total=Wallet::where('user_id',$item->id)->first();
            }
        }elseif($request->filter=="suspended"){
            $instructors = Instructor::where('type','instructor')->where('suspended',0)->orderBy('id', 'DESC')->get();
            foreach ($instructors as $item) {   
                $item->course_count=Course::where('userId',$item->id)->count();
                $item->wallet_total=Wallet::where('user_id',$item->id)->first();
            }
        }elseif($request->filter=="blocked"){
            $instructors = Instructor::where('type','instructor')->where('blocked',0)->orderBy('id', 'DESC')->get();
            foreach ($instructors as $item) {   
                $item->course_count=Course::where('userId',$item->id)->count();
                $item->wallet_total=Wallet::where('user_id',$item->id)->first();
            }
        }elseif($request->filter=="published"){
            $instructor_publish_course=Instructor::where('type','instructor')->get();
            $instructors=[];
            foreach ($instructor_publish_course as $item) {   
                $course_sum= Course::where('userId',$item->id)->first();
                
               
                
                if($course_sum){
                    $item->course_count=Course::where('userId',$item->id)->count();
                    $item->wallet_total=Wallet::where('user_id',$item->id)->first();
                    $instructors[]=$item;
                }
            }
            
        }
        // dd($instructors);
        //  $instructors = Instructor::where('type','instructor')->where('status',1)->orderBy('id', 'DESC')->get();
        return view('admin.instructors.all',compact('instructors'));
    }
    public function updateStatus(Request $request)
    {
        $user = Instructor::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['message' => 'User status updated successfully.']);
    }
    
    public function updateSuspended(Request $request)
    {
       $user = Instructor::findOrFail($request->user_id);
        $user->suspended = $request->suspended;
        $user->save();
        return response()->json(['message' => 'updated successfully.']);
    }

    public function updateBlocked(Request $request)
    {
       $user = Instructor::findOrFail($request->user_id);
        $user->blocked = $request->blocked;
        $user->save();
        return response()->json(['message' => 'updated successfully.']);
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Instructor $instructor)
    {
        //
    }
    
    public function edit(Instructor $instructor)
    {
        //
    }

    
    public function update(Request $request, Instructor $instructor)
    {
        
    }

    public function destroy(Request $request)
    {
        $delete = Instructor::findOrFail($request->id);
        $delete->delete();
        return back()->with("message",'تم الحذف بنجاح'); 
    }

    public function destroyCourse(Request $request)
    {
        // dd('dddd');
        $delete = Course::findOrFail($request->id);
        
          if($delete){
                $course_video= Video::where('courseId',$delete->id)->get();
                foreach ($course_video as $video) {         
                    File::delete("/home/u9ak0fjx/public_html/assets_admin/img/courses/videos/" . $video->url);
                    $delete_video = Video::findOrFail($video->id);
                    $delete_video->delete();
                }
                
                $courses_joined= Courses_joined::where('courseId',$delete->id)->get();
                foreach ($courses_joined as $item) {         
                    $delete_course = Courses_joined::findOrFail($item->id);
                    $delete_course->delete();
                }
            }
            $delete->delete();
            File::delete("/home/u9ak0fjx/public_html/assets_admin/img/courses/" . $delete->image);
            // return redirect()->route('courses.index')->with("message",'تم الحذف بنجاح'); 
        return back()->with("message",'تم الحذف بنجاح'); 
    }
    public function destroyCourseLive(Request $request)
    {
        $delete = Straight::findOrFail($request->id);
        $delete->delete();
        return back()->with("message",'تم الحذف بنجاح'); 
    }

    public function profile($id)
    {
        $instructor = Instructor::findOrFail($id);
        $country= Country::where('id',$instructor->countryId)->first();
        $instructor->country=$country->name;
        
        $courses = Course::where('userId',$instructor->id)->get();
        $straights = Straight::where('userId',$id)->get();
        
        // $join_courses = Course::where('userId',$instructor->id)->get();
        // $join_courses_live = Straight::where('userId',$instructor->id)->get();
        
        $join_courses=[];
        foreach ($courses as $items) {
            $join_co=Courses_joined::where('courseId',$items->id)->first();
            if($join_co){
                $join_courses[]= $join_co;
            }
        }
        
        foreach ($join_courses as $join_cours) {
            $join_cours->course=Course::where('id',$join_cours->courseId)->first();
            $join_cours->student=Instructor::where('id',$join_cours->userId)->first();
             
        }



        $join_courses_live=[];
        foreach ($straights as $course_live) {
            $join_co=Courses_joined::where('liveId',$course_live->id)->first();
            if($join_co){
               $join_courses_live[]= $join_co;
            }
        }
        foreach ($join_courses_live as $join_cours) {
            $join_cours->course=Straight::where('id',$join_cours->liveId)->first();
            $join_cours->student=Instructor::where('id',$join_cours->userId)->first();
        }
        // dd($join_courses);


        $bankdetails=Bank::where('userId',$instructor->id)->first();
        $country= Country::All();
        
        
        $cities=City::all();
        foreach ($cities as $item) {
            $item->country= Country::where('id',$item->countryId)->first();
        }

        // $reviews=Review::where('userId',$instructor->id)->get();
        // foreach ($reviews as $item) {
        //     $item->instructor= Instructor::where('id',$item->userId)->first();
        //     $item->course= Course::where('id',$item->courseId)->first();
        // }

        $reviews=[];
        foreach ($courses as $items) {
            $reviews_course=Review::where('courseId',$items->id)->first();
            if($reviews_course){
               $reviews[]= $reviews_course;
            }
        }
       
        foreach ($reviews as $review) {
            $review->course=Course::where('id',$review->courseId)->first();
            $review->student=Instructor::where('id',$review->userId)->first();
             
        }
        // $straights=Straight::where('courseId',$items->id)->first();;
        // dd($reviews);
        return view('admin.instructors.instructor-profile',compact('instructor','courses','straights',
            'join_courses','join_courses_live','bankdetails','country','cities','reviews'));
    }
    
    public function instructorNotifaction()
    {
        $instructors= Instructor::where('type','instructor')->get();
        return view('admin.instructors.notifaction',compact('instructors'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request->id);
        $edit = instructor::findOrFail($request->id);
        $edit->name    = $request->name;
        $edit->mobile  = $request->mobile;
        $edit->detail  = $request->detail; 
        // $add->countryId  = $request->countryId; 
        // $add->cityId  = $request->cityId;         
        if($file=$request->file('photo'))
        {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/profiles';
            $request-> file('photo') ->move($path,$file_name); 
            $edit->photo  =$file_nameone;
        }else{
            $edit->photo  = $request->url; 
        }
        $edit->save();
        return back()->with("success", 'تم التعديل بنجاح'); 
    }
    public function instructorSendNotifaction(Request $request)
    {
        // dd($request->doctorId);
        // dd($request->message);
        $length = count($request->userId);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                $instructor = instructor::where('id',$request->userId[$i])->first();
                
                $details = [
                    // 'subject' => 'elnamat.com',
                    'report' => $request->message,
                ];
                
                // Mail::to($instructor->email)->send(new \App\Mail\Notifaction($details));
                
                $instructor->notify(new \App\Notifications\InstructorNewNotification(
                    $instructor->id,
                    $request->title='fds',
                    $request->message
                    
                ));  

            }                      
        }
         
        return redirect()->back()->with("message","تم الإرسال");       
    }

    public function oneInstructorNotifaction(Request $request)
    {
       
        $instructor = instructor::where('id',$request->userId)->first();          
        $instructor->notify(new \App\Notifications\InstructorNewNotification(
            $instructor->id,
            $request->title='fds',
            $request->message                    
        ));  

        return redirect()->back()->with("message","تم الإرسال");       
    }



}
