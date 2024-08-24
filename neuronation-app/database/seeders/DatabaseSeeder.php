<?php

namespace Database\Seeders;

use App\Models\DomainCategory;
use App\Models\User;
use App\Services\Providers\SessionScoresProvider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DomainCategorySeeder::class,
            DifficultySeeder::class,
            CoursesExerciseSeeder::class,
            SessionScoreSeeder::class,
        ]);
    }
}
