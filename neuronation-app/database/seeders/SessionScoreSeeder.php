<?php

namespace Database\Seeders;

use App\Repositories\SessionScoreRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionScoreSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = DB::select('SELECT id from users WHERE email = "neuronation@test.com"');
        $course = DB::select('SELECT id from courses WHERE name = "Course Test 1"');
        $startDifficulty = DB::select('SELECT id from difficulties WHERE name = "Easy"');
        $endDifficulty = DB::select('SELECT id from difficulties WHERE name = "Hard"');

        $sessionScoreRepository = new SessionScoreRepository();
        $tablePartition = $sessionScoreRepository->determinePartition($user[0]->id);

        for ($i = 0; $i <= 5; $i++) {
            DB::table($tablePartition)->insert([
                'uuid' => fake()->uuid(),
                'score' => fake()->numberBetween(0, 20),
                'score_normalized' => fake()->numberBetween(0, 20),
                'created_at' => new \DateTimeImmutable('now'),
                'user_id' => $user[0]->id,
                'course_id' => $course[0]->id,
                'start_difficulty_id' => $startDifficulty[0]->id,
                'end_difficulty_id' => $endDifficulty[0]->id,
            ]);
        }
    }
}
