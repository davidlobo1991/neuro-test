<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // partition of table because of the high volume of score records

        foreach (range(0, 5) as $partition) {
            DB::statement(
                sprintf("
                    CREATE TABLE session_scores_%s (
                        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        course_id INT UNSIGNED NOT NULL,
                        uuid VARCHAR(255) NOT NULL,
                        user_id BIGINT UNSIGNED NOT NULL,
                        score INT NOT NULL,
                        score_normalized DECIMAL(8, 2) NULL,
                        start_difficulty_id INT UNSIGNED NOT NULL,
                        end_difficulty_id INT UNSIGNED NOT NULL,
                        created_at TIMESTAMP NULL,
                        updated_at TIMESTAMP NULL,
                        FOREIGN KEY (course_id) REFERENCES courses(id),
                        FOREIGN KEY (user_id) REFERENCES users(id),
                        FOREIGN KEY (start_difficulty_id) REFERENCES difficulties(id),
                        FOREIGN KEY (end_difficulty_id) REFERENCES difficulties(id)
                    )",
                    $partition
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (range(0, 5) as $partition) {
            DB::statement(
                sprintf('DROP TABLE IF EXISTS session_scores_%s',
                         $partition
                )
            );
        }
    }
};

