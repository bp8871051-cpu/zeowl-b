<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'author_name',
        'author_role',
        'author_avatar',
        'read_time',
        'date_display',
        'cover_image',
        'tags',
        'views_count',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'content' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];
}
