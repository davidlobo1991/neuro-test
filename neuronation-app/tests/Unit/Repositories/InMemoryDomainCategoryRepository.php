<?php

namespace Repositories;

use App\Repositories\DomainCategoryRepositoryInterface;

class InMemoryDomainCategoryRepository implements DomainCategoryRepositoryInterface
{
    public array $categories;

    public function getLastCategories(string $sessionPartition, int $userId): array
    {
        return $this->categories;
    }
}

