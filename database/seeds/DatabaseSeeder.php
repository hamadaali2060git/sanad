<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // to add in table php artisan db:seed --class=PermissionTableSeeder
        // $this->call(PermissionTableSeeder::class);

        // to add in table php artisan db:seed --class=CreateAdminUserSeeder
        // $this->call(CreateAdminUserSeeder::class);

        // $this->call(SettingSeeder::class);

        // $this->call(ChatsTableSeeder::class);
        
        $this->call(MessagesTableSeeder::class);
    }

    
}
