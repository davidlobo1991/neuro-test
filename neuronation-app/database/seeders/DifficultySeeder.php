<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $difficulties = ['Very easy', 'Easy', 'Normal', 'Hard', 'Very Hard'];

        array_map(static function($difficulty) {
            DB::table('difficulties')->insert([
                'name' => $difficulty,
            ]);
        }, $difficulties);
    }
}
