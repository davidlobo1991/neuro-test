<?php

namespace Repositories;

use App\Repositories\SessionScoreRepositoryInterface;

class InMemorySessionScoreRepository implements SessionScoreRepositoryInterface
{
    public array $scores;
    public const tableName = 'session_scores_1';

    public function getScoresByUserId($userId): array
    {
        return $this->scores;


    }
    public function determinePartition($userId): string
    {
        return self::tableName;
    }
}

