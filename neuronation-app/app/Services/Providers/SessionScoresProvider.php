<?php

namespace App\Services\Providers;

use App\Repositories\SessionScoreRepositoryInterface;
use App\Resources\DataTransfer\SessionScoreDto;
use Illuminate\Support\Collection;

class SessionScoresProvider
{
    private SessionScoreRepositoryInterface $sessionScoreRepository;
    public function __construct(
        SessionScoreRepositoryInterface $sessionScoreRepository
    )
    {
        $this->sessionScoreRepository = $sessionScoreRepository;
    }

    public function provide(int $userId): Collection
    {
        $scores = $this->sessionScoreRepository->getScoresByUserId($userId);

        $sessionScoreValues = array_map(static function ($score) {
            return SessionScoreDto::create((array) $score);
        }, $scores);

        return collect($sessionScoreValues);

    }
}
