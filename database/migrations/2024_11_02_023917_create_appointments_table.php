<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['available', 'booked', 'completed', 'canceled'])->default('available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
