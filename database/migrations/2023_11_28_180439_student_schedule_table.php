<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('batch_id');
            $table->string('room_code');
            $table->string('subject_name');
            $table->string('teacher_name');
            $table->string('day');
            $table->time('time_in');
            $table->time('time_out');
            $table->timestamps();

            // Foreign key constraints
     
            // Add more foreign key constraints if needed

            // You can customize the migration further based on your requirements
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_schedules');
    }
};
