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
        //
        Schema::create('teacherschedule', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('time_from');
            $table->string('time_to');
            $table->integer('year');
            $table->string('semester');

            $table->string('faculty_list_id');
            $table->string('room_id');
            $table->string('subject_id');


            // $table->foreignId('faculty_list_id');
            // $table->foreignId('room_id');
            // $table->foreignId('subject_id');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('teacherschedule');
    }
};
