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
        Schema::create('studentbatch', function (Blueprint $table) {
            $table->id();
            $table->string('student_no');
            $table->string('year');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('block');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentbatch');
    }
};
