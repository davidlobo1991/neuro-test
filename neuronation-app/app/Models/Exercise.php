<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'points',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DomainCategory::class);
    }
}
