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
        Schema::create('facultylist', function (Blueprint $table) {
            $table->id();
            $table->string('id_no');
            $table->string('name');
            $table->string('course');
            $table->string('email')->unique();
            // $table->string('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultylist');
    }
};
