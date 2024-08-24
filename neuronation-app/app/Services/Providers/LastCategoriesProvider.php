<?php

namespace App\Services\Providers;

use App\Repositories\DomainCategoryRepositoryInterface;
use App\Repositories\SessionScoreRepositoryInterface;
use Illuminate\Support\Collection;

class LastCategoriesProvider
{
    private DomainCategoryRepositoryInterface $domainCategoryRepository;
    private SessionScoreRepositoryInterface $sessionScoreRepository;

    public function __construct(
        DomainCategoryRepositoryInterface $domainCategoryRepository,
        SessionScoreRepositoryInterface $sessionScoreRepository,
    )
    {
        $this->domainCategoryRepository = $domainCategoryRepository;
        $this->sessionScoreRepository = $sessionScoreRepository;
    }

    public function provide(int $userId): Collection
    {
        $sessionPartition = $this->sessionScoreRepository->determinePartition($userId);
        $lastPositions = $this->domainCategoryRepository->getLastCategories($sessionPartition, $userId);

        return collect($lastPositions);

    }
}
