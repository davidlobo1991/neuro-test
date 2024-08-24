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
        DB::statement(
            'CREATE TABLE failed_jobs (
                    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    uuid VARCHAR(255) NOT NULL UNIQUE,
                    connection TEXT NOT NULL,
                    queue TEXT NOT NULL,
                    payload LONGTEXT NOT NULL,
                    exception LONGTEXT NOT NULL,
                    failed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                )'
            );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
