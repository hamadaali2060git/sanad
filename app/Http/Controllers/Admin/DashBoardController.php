<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Instructor;
use App\Course;
class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {       
        
        $instructor_count=Instructor::where('type','instructor')->count();
        $student_count=Instructor::where('type','student')->count();
        $course_count=Course::count();
        return view('admin.index_admin',compact('instructor_count','student_count','course_count'));
    }

    // public function create()
    // {
    //     return view('admin.sliders.create');
    // }
    

    // public function store(AircraftRequest $request)
    // {
    //     $userId = 1;
    //     $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //     $file_name = time().'.'.$file_extension;
    //     $file_nameone = $file_name;
    //     $path = 'admin/images/aircraft';
    //     $request-> file('logoone') ->move($path,$file_name);

    //     $request->merge(['created_by'=>$userId]);
    //     $request->merge(['logo'=>$file_nameone]);
    //     //dd($request->all());
    //     Slider::create($request->all());
    //     return redirect()->back()->with("message", __('admin.createSuccess')); 
    // }

    
    // public function edit(Slider $slider)
    // {
    //     return view('admin.sliders.edit',compact('slider'));
    // }

    // public function update(AircraftRequest $request, Slider $slider)
    // {
    //     $userId = 1;
    //      if($file=$request->file('logoone'))
    //      {
    //         $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //         $file_name = time().'.'.$file_extension;
    //         $file_nameone = $file_name;
    //         $path = 'admin/images/aircraft';
    //         $request-> file('logoone') ->move($path,$file_name);
    //         $request->merge(['logo'=>$file_nameone]);

    //          $request->merge(['updated_by'=>$userId]);
    //          $slider->update($request->all());
    //      }else{
    //       $request->merge(['logo'=> $request->url]);
    //       $request->merge(['updated_by'=>$userId]);
    //       $slider->update($request->all());
    //      }
       
    //     dd($request->all());
    //     //return redirect()->route('aircraft.index')->with("message", __('admin.updateSuccess')); 
    // }

    public function destroy(Slider $slider)
    {

        $Charter=Charter::where('aircraftId',$slider->id)->get(); 
        if(count($Charter) == 0){
            $slider->delete();
            return redirect()->route('aircraft.index')->with("message", __('admin.deleteSuccess')); 
        }else{
           return redirect()->back()->with("error", 'It is not allowed to delete this item'); 
        }

        
    } 
}
