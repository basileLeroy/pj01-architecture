<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        "is_primary",
        "title",
        "slug",
        "author",
        "cover",
        "content",
        "language",
        "index",
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
