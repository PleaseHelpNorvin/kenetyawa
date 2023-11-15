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
        // Create batches table
        Schema::create('studentbatch', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name')->unique();
            $table->timestamps();
        });

        // Create blocks table
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->string('block_name')->unique();;
            $table->foreignId('batch_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop blocks table
        Schema::dropIfExists('blocks');

        // Drop batches table
        Schema::dropIfExists('studentbatch');
    }
};
?>
