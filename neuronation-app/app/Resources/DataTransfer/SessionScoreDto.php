<?php

namespace App\Resources\DataTransfer;

class SessionScoreDto
{
    public int $score;
    public int $date;

    /**
     * @throws \Exception
     */
    public static function create(array $value): SessionScoreDto
    {
        $sessionScore = new self();
        $sessionScore->score = $value['score'];
        $sessionScore->date = self::getDateImmutable($value['date'])->getTimestamp();

        return $sessionScore;
    }


    /**
     * @throws \Exception
     */
    protected static function getDateImmutable($date): \DateTimeImmutable
    {
        return new \DateTimeImmutable($date);
    }
}
