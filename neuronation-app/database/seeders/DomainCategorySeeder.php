<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Memory', 'Reasonable', 'Perception'];

        array_map(static function($category) {
            DB::table('domain_categories')->insert([
                'name' => $category,
                'created_at' => new \DateTimeImmutable('now'),
            ]);
        }, $categories);
    }
}
