<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $category = DB::select('SELECT id from domain_categories WHERE name = "Memory"');

        DB::table('exercises')->insert([
            'name' => 'Exercise 1',
            'points' => 10,
            'domain_category_id' => $category[0]->id,
        ]);

        DB::table('courses')->insert([
            'name' => 'Course Test 1',
        ]);

        $course = DB::select('SELECT id from courses WHERE name = "Course Test 1"');
        $exercise = DB::select('SELECT id from exercises WHERE name = "Exercise 1"');

        DB::table('course_exercise')->insert([
            'course_id' => $course[0]->id,
            'exercise_id' => $exercise[0]->id,
        ]);

    }
}
