<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('countryId')->nullable(); // Country ID
            $table->string('name')->nullable(); // First name
            $table->string('full_name')->nullable(); // Full name
            $table->string('email')->nullable(); // Email
            $table->string('password'); // Password
            $table->string('city', 50)->nullable(); // City
            $table->string('street1')->nullable(); 
            $table->string('first_name')->nullable(); 
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable(); 
            $table->text('photo')->nullable(); 
            $table->string('detail')->nullable(); 
            $table->integer('status')->default(0);
            $table->string('type')->nullable(); 

            $table->string('postal_code')->nullable();
            $table->text('identity')->nullable();
            $table->text('certificate_one')->nullable();
            $table->text('certificate_two')->nullable();
            $table->text('certificate_three')->nullable();
            $table->text('cv')->nullable();
            $table->integer('is_activated')->default(0);
            $table->text('token')->nullable();
            $table->text('device_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructors');
    }
}
