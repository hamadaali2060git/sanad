<?php

namespace App\Http\Controllers\Instructor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\Straight;
use App\Wallet;
class DashBoardController extends Controller
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
        
        // dd($notifications);
        // return \Response::json($notifications);
        // return $this->returnData('patients', $notifications);
        $userid = Auth::guard('instructors')->user();
        // $user_wallet= Wallet::where('user_id',$userid->id)->first();
        $courses=Course::where('user_id',$userid->id)->count();
        // $books_count=Course::where('userId',$userid->id)->count();
        // dd($books_count);
        return view('instructor.index',compact('courses'));
    }

    

    
}
