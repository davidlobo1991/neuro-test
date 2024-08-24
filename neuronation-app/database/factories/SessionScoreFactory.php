<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class SessionScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = DB::select('SELECT id from users WHERE email = "neuronation@test.com"');
        $course = DB::select('SELECT id from course WHERE name = "Exercise 1"');
        $startDifficulty = DB::select('SELECT id from difficulties WHERE name = "Easy"');
        $endDifficulty = DB::select('SELECT id from difficulties WHERE name = "Hard"');

        return [
            'uuid' => fake()->uuid(),
            'score' => fake()->numberBetween(0, 20),
            'score_nominated' => fake()->numberBetween(0, 20),
            'created' => new \DateTimeImmutable('now'),
            'user_id' => $user[0]->id,
            'course_id' => $course[0]->id,
            'start_difficulty_id' => $startDifficulty[0]->id,
            'end_difficulty_id' => $endDifficulty[0]->id,
        ];
    }
}
