<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SessionScoreRepository implements SessionScoreRepositoryInterface
{
    public const tableName = 'session_scores_';
    public const numberOfPartitions = 5;

    public function getScoresByUserId($userId): array
    {
        $table = $this->determinePartition($userId);
        return DB::select(
            "SELECT score, created_at as 'date' FROM $table WHERE user_id = :user_id",
            [
                'user_id' => $userId
            ]
        );
    }
    public function determinePartition($userId): string
    {
        $partition = $this->calculatePartition($userId);
        return self::tableName . $partition;
    }

    private function calculatePartition($userId): int
    {
        return $userId % self::numberOfPartitions;
    }
}

