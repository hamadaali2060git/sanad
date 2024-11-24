<?php

use Illuminate\Database\Seeder;
use App\Instructor;
use App\Chat;
class ChatsTableSeeder extends Seeder
{
    public function run()
    {
        // محادثة فردية
        $individualChat = Chat::create([
            'title' => 'محادثة فردية بين طالب ومدرب'
        ]);

        // إضافة مستخدمين للمحادثة الفردية
        $student = Instructor::where('type', 'student')->first();
        $instructor = Instructor::where('type', 'instructor')->first();

        $individualChat->users()->attach([$student->id, $instructor->id]);

        // محادثة جماعية
        $groupChat = Chat::create([
            'title' => 'محادثة جماعية بين عدة طلاب ومدرب'
        ]);

        // إضافة مجموعة من الطلاب ومدرب للمحادثة الجماعية
        $students = Instructor::where('type', 'student')->take(3)->pluck('id')->toArray(); // اختيار 3 طلاب
        $groupChat->users()->attach(array_merge($students, [$instructor->id])); // إضافة المدرب أيضًا
    }
}
