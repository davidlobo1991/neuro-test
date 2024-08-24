<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class DomainCategoryRepository implements DomainCategoryRepositoryInterface
{
    public const tableName = 'domain_categories';

    public function getLastCategories(string $sessionPartition, int $userId): array
    {
        return DB::select(
            "SELECT dc.name
                    FROM domain_categories dc
                    INNER JOIN exercises e ON e.domain_category_id = dc.id
                    INNER JOIN course_exercise ce ON ce.exercise_id = e.id
                    INNER JOIN courses c ON c.id = ce.course_id
                    INNER JOIN $sessionPartition sc ON sc.course_id = c.id
                    INNER JOIN users u ON u.id = sc.user_id
                    WHERE u.id = :user_id
                    LIMIT 2 ",
            [
                'user_id' => $userId
            ]
        );
    }
}
