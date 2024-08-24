<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'timestamp',
    ];

    public function users()
    {
        return $this->hasManyThrough(User::class, Course::class);
    }
}
