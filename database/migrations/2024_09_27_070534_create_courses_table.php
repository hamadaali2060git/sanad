<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('slug_ar');
            $table->string('slug_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('date');
            $table->string('time');
            $table->string('duration');
            $table->string('language');
            $table->integer('payed');
            $table->float('price');
            $table->text('image'); 
            $table->text('video')->nullable(); 
            $table->integer('status')->default(0);
            $table->text('meeting_url')->nullable(); 
            $table->text('meeting_password')->nullable(); 
            $table->text('meeting_id')->nullable(); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
