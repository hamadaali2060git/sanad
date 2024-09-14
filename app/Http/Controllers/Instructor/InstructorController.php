<?php

namespace App\Http\Controllers\Instructor;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Video;
use Crypt;
use Hash;
class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('instructors')->user();
        $course=Course::where('user_id',$user->id)->get();        
        return view('instructor.profile',compact('user','course'));
    }
    public function termsConditions()
    {
        return view('instructor.terms');
    }
    public function instructorVideo()
    {
        $videos=Video::get();
        return view('instructor.instructor_video',compact('videos'));
    }
    public function updateProfile(Request $request)
    {
        $userid = Auth::guard('instructors')->user();
        if(!$userid)
            return redirect('user-login');

        $edit = instructor::findOrFail($userid->id);
        if($file=$request->file('photo'))
        {
            $file_extension = $request -> file('photo')->getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/profiles/instructors';
            $request-> file('photo') ->move($path,$file_name);
            $edit->photo  = $file_nameone;
        }else{
            $edit->photo  = $edit->photo;
        }

        if(isset($request->name)){
            $edit->name  = $request->name;
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
        return back()->with("message", 'تم التعديل بنجاح');
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
