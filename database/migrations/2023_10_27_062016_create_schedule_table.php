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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faculty_id'); // You need to create a "faculties" table and link it with a foreign key constraint.
            $table->string('title');
            $table->string('schedule_type');
            $table->string('description');
            $table->string('room_location');
            $table->string('days_of_week');
            $table->date('month_from');
            $table->date('month_to');
            $table->time('time_from');
            $table->time('time_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};
