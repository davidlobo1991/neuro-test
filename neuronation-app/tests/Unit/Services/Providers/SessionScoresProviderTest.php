<?php

namespace Services\Providers;

use App\Repositories\SessionScoreRepositoryInterface;
use App\Resources\DataTransfer\SessionScoreDto;
use App\Services\Providers\SessionScoresProvider;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class SessionScoresProviderTest extends TestCase
{
    private SessionScoresProvider $sessionScoresProvider;

    /** @test SessionScoreProvider */

    protected function setUp(): void
    {
        parent::setUp();

        $sessionScoreRepository = $this->createMock(SessionScoreRepositoryInterface::class);
        $userId = 1;
        $scoreData = $this->generateScoreData($userId);

        $sessionScoreRepository
            ->method('getScoresByUserId')
            ->with($userId)
            ->willReturn($scoreData);

        $this->sessionScoresProvider = new SessionScoresProvider($sessionScoreRepository);

    }

    public function test_session_store_provider(): void
    {
        // given two scored values

        $dateTimestamp = new \DateTimeImmutable('2024-08-24 12:00');

        // when the provider is called
        $sessionScoreValue = $this->sessionScoresProvider->provide(1);

        // then the result returned is a collection of session scores
        $this->assertInstanceOf(Collection::class, $sessionScoreValue);
        $this->assertInstanceOf(SessionScoreDto::class, $sessionScoreValue->first());
        $this->assertIsIterable($sessionScoreValue);

        // and then the dates are converted to timestamp
        $this->assertSame(
            $sessionScoreValue->first()->date,
            $dateTimestamp->getTimestamp()
        );

        // and then in this case we get a collection of two values
        $this->assertSame($sessionScoreValue->count(), 2);
    }


    protected function generateScoreData($userId): array
    {
        return [
            [
                'score' => 100,
                'date' => '2024-08-24 12:00'
            ],
            [
                'score' => 200,
                'date' => '2024-08-24 12:00'
            ],
        ];
    }
}
