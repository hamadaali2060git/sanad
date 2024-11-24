<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Slider;
use App\Course;
use App\Category;
use App\Courses_joined;
use App\Instructor;
use App\Chat;
use Hash;
use App\Http\Resources\CourseResource;
use App\Rules\ReCaptcha;
use DB;

class ChatController extends Controller
{
    public function myChats()
    {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');
        $chats = Chat::select('chats.*')
            ->join('chat_user', 'chats.id', '=', 'chat_user.chat_id')
            ->where('chat_user.instructor_id', $user->id)
            ->with(['users', 'messages'])
            ->get();
        // dd($chats);
        $chat_id=null;
        return view('front.chats',compact('user','chats','chat_id'));
    }
    public function chatUserId($chat_id,$instructorId)
    {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');
        $chats = Chat::select('chats.*')
            ->join('chat_user', 'chats.id', '=', 'chat_user.chat_id')
            ->where('chat_user.instructor_id', $user->id)
            ->with(['users', 'messages'])
            ->get();
        // $instructor=Instructor::find($instructorId);
            // dd($instructorId);
        return view('front.chat',compact('user','chats','chat_id','instructorId'));
    }
    public function createStudentCat($instructorId)
    {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');

        $chat = Chat::whereHas('users', function ($query) use ($user) {
                    $query->where('instructor_id', $user->id);
                })->whereHas('users', function ($query) use ($instructorId) {
                    $query->where('instructor_id', $instructorId);
                })->first();
        // dd($chat);
        
        if (!$chat) {
            $chat = Chat::create([
                'title' => ''
            ]);
            DB::table('chat_user')->insert([
                ['chat_id' => $chat->id, 'instructor_id' => $user->id],
                ['chat_id' => $chat->id, 'instructor_id' => $instructorId],
            ]);
        }
        //  return redirect()->route('chat/user', ['id' => $chat->id]);
       return redirect()->route('chat/user', ['id' => $chat->id,$instructorId]);
       

    }
}