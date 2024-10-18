<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->char('id');
            $table->string('type');
            $table->string('notifiable_type'); 
            $table->integer('notifiable_id');
            $table->text('data'); // لتخزين بيانات الإشعار
            $table->timestamp('read_at')->nullable(); // لتحديد وقت قراءة الإشعار
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
        Schema::dropIfExists('notifications');
    }
}
