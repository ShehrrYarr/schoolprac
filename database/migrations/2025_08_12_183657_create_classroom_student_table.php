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
        Schema::create('classroom_student', function (Blueprint $table) {
             $table->foreignId('classroom_id')
                  ->constrained('classrooms')
                  ->onDelete('cascade');

            $table->foreignId('student_id')
                  ->constrained('students')
                  ->onDelete('cascade');

            // pivot metadata (useful for dynamic behaviour)
            $table->timestamp('assigned_at')->nullable();
            $table->boolean('is_active')->default(true);

            $table->primary(['classroom_id', 'student_id']);

            $table->timestamps(); // optional but handy for auditing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_student');
    }
};
