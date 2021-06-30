<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_name',
        'project_image',
        'project_gallery'
    ];

    protected $casts = [
        'project_gallery' => 'array'
    ];

    protected $table = "projects";
}
