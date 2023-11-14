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

        // Create studentbatch table
        Schema::create('studentbatch', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->timestamps();
        });

        // Create blocks table
        Schema::create('blocks', function (Blueprint $table) {
            // $table->id();
            $table->integer('id')->increments();
            $table->integer('block_id'); // Non-unique 'block_id'

            $table->string('block_name');
            $table->foreignId('batch_id')->constrained('studentbatch');
            $table->timestamps();
        });

        // Create students table
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_no');
            $table->string('name');
            $table->unsignedBigInteger('batch_id');
            $table->integer('block_id'); // Non-unique 'block_id'

            $table->string('course');
            $table->string('contact_no');
            $table->string('email');
            $table->timestamps();

            $table->foreign('batch_id')->references('id')->on('studentbatch');
            $table->foreignId('block_id')->constrained('blocks','block_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop studentbatch table
        Schema::dropIfExists('studentbatch');
        // Drop blocks table
        Schema::dropIfExists('blocks');
        // Drop students table
        Schema::dropIfExists('students');
    }
};
