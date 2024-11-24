<?php

use Illuminate\Database\Seeder;
use App\Instructor;
use App\Chat;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    public function run()
    {
        // جلب المحادثة الفردية والمحادثة الجماعية
        $individualChat = Chat::where('title', 'محادثة فردية بين طالب ومدرب')->first();
        $groupChat = Chat::where('title', 'محادثة جماعية بين عدة طلاب ومدرب')->first();

        // جلب المستخدمين الذين سيقومون بإرسال الرسائل
        $student = Instructor::where('type', 'student')->first();
        $trainer = Instructor::where('type', 'instructor')->first();

        // رسائل للمحادثة الفردية
        Message::create([
            'chat_id' => $individualChat->id,
            'instructor_id' => $student->id,
            'message' => 'مرحباً أستاذ، كيف يمكنني تحسين مهاراتي في البرمجة؟'
        ]);

        Message::create([
            'chat_id' => $individualChat->id,
            'instructor_id' => $trainer->id,
            'message' => 'مرحباً، يمكنك البدء بتعلم الأساسيات أولاً ثم الانتقال لمشاريع عملية.'
        ]);

        // رسائل للمحادثة الجماعية
        $students = Instructor::where('type', 'student')->take(3)->get();

        foreach ($students as $index => $student) {
            Message::create([
                'chat_id' => $groupChat->id,
                'instructor_id' => $student->id,
                'message' => 'رسالة من الطالب ' . ($index + 1)
            ]);
        }

        Message::create([
            'chat_id' => $groupChat->id,
            'instructor_id' => $trainer->id,
            'message' => 'مرحباً بالجميع! كيف تسير الأمور في التدريب؟'
        ]);
    }
}
