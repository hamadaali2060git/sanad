<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Message;
use App\Chat;
use Illuminate\Support\Facades\Auth;
class ChatInstructorForm extends Component
{
    public $chatId;
    public $message;
    public $messages;
    public function mount($chatId)
    {
        $this->chatId = $chatId;
        // $this->messages = Message::where('chat_id', $this->chatId)
        //                          ->orderBy('created_at', 'asc')
        //                          ->get();
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
 $this->emit('messageSent');
        // تفريغ حقل الإدخال بعد الإرسال
        $this->message = '';

        // تحديث الرسائل في الوقت الفعلي
        // $this->emit('messageSent');
    }
    public function render()
    {
        return view('livewire.chat-instructor-form');
    }
}
