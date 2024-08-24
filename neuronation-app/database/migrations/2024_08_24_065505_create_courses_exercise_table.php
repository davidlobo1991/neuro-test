<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE TABLE course_exercise (
                course_id INT UNSIGNED NOT NULL,
                exercise_id INT UNSIGNED NOT NULL,
                created_at TIMESTAMP NULL,
                PRIMARY KEY (course_id, exercise_id),
                FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
                FOREIGN KEY (exercise_id) REFERENCES exercises(id) ON DELETE CASCADE
            )'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_exercise');
    }
};
