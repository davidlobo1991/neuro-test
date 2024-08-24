<?php

namespace App\Repositories;

interface DomainCategoryRepositoryInterface
{
    public function getLastCategories(string $sessionPartition, int $userId): array;
}
