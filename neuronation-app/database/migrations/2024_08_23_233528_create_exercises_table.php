<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE TABLE exercises (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                domain_category_id INT UNSIGNED NOT NULL,
                points INT NOT NULL,
                created_at TIMESTAMP NULL,
                FOREIGN KEY (domain_category_id) REFERENCES domain_categories(id) ON DELETE SET NULL
            )'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');

    }
};
