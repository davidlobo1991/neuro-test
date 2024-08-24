<?php

namespace App\Repositories;

interface SessionScoreRepositoryInterface
{
    public function getScoresByUserId($userId): array;
    public function determinePartition($userId): string;

}

