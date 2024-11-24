<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Message;
use App\Chat;
use Illuminate\Support\Facades\Auth;
class ChatInstructorMessages  extends Component
{
    // public $chatId;
    // public $messages;
    // protected $listeners = ['messageSent' => 'refreshMessages'];
    // public function mount($chatId)
    // {
    //     $this->chatId = $chatId;
    //     $this->loadMessages();
    // }

    // public function loadMessages()
    // {
    //     $this->messages = Message::where('chat_id', $this->chatId)
    //                                 // ->orderBy('created_at', 'asc')
    //                                 ->latest()->take(20)->get()->reverse();
    // }

    // public function refreshMessages()
    // {
    //     $this->loadMessages();
    // }
    // public function render()
    // {
    //     return view('livewire.chat-instructor-messages');
    // }















    public $chatId;
    
    public function mount($chatId)
    {
        $this->chatId = $chatId;
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
        return view('livewire.chat-instructor-messages', [
            'messages' => $this->messages // استخدام خاصية `messages`
        ]);
    }
}

