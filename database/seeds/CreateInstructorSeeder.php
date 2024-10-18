<?php

use Illuminate\Database\Seeder;
use App\Instructor;
class CreateInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Instructor::create([
            'first_name' => 'instructor',
            'last_name' => 'instructor',
            'name' => 'instructor',
            'mobile' => '12345',
            'email' => 'instructor@instructor.com',
            'password' => bcrypt('1234'),
            'type' => 'instructor',
        ]);
    }
}
