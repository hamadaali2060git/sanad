<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Message;
use App\Chat;
use App\Instructor;
use Illuminate\Support\Facades\Auth;

class ChatStudentMessages extends Component
{
    public $chatId;
    public $instructorId;
    public $message;
    // public $messages;

    public function mount($chatId,$instructorId)
    {
        
        $this->chatId = $chatId;
        $this->instructorId = $instructorId;

        // $this->messages = Message::where('chat_id', $this->chatId)
        //                          ->orderBy('created_at', 'asc')
        //                          ->get();
        
        // dd($this->messages);
    }

    public function sendMessage()
    {
        $user = Auth::guard('instructors')->user();
        // التحقق من أن الحقل غير فارغ
        if (trim($this->message) === '') {
            return;
        }

        // إنشاء رسالة جديدة وربطها بالشات
        $newMessage = Message::create([
            'chat_id' => $this->chatId,
            'instructor_id' => $user->id,
            'message' => $this->message,
        ]);

        // إعادة ضبط الرسالة الجديدة إلى قائمة الرسائل
        // $this->messages->push($newMessage);

        // تفريغ حقل الإدخال بعد الإرسال
        $this->message = '';

        // تحديث الرسائل في الوقت الفعلي
        // $this->emit('messageSent');
    }

    public function getMessagesProperty()
    {
        // جلب الرسائل من قاعدة البيانات
        return Message::where('chat_id', $this->chatId)
            ->latest()
            ->take(10)
            ->get()
            ->reverse(); // عكس الترتيب لعرض الرسائل من الأقدم إلى الأحدث
    }

    public function render()
    {
        $instructor = Instructor::find($this->instructorId);
        return view('livewire.chat-student-messages', [
            'messages' => $this->messages, // استخدام خاصية `messages`
            'instructor'=>$instructor
        ]);
    }
}