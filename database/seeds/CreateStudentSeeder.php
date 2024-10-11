<?php

use Illuminate\Database\Seeder;
use App\Instructor;
class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Instructor::create([
            'first_name' => 'student',
            'last_name' => 'student',
            'mobile' => '123456',
            'email' => 'student@student.com',
            'password' => bcrypt('1234'),
            'type' => 'student',
        ]);
    }
}
