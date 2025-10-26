<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'featured_image',
        'images',
        'tech_stack',
        'demo_url',
        'github_url',
        'is_featured',
        'is_published',
        'order',
    ];

    protected $casts = [
        'images' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}