<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "is_primary",
        'title',
        'description',
        'slug',
        'cover',
        'link',
        'language',
        'index'
    ];
}
