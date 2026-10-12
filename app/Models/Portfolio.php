<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_code',
        'title',
        'slug',
        'domain',
        'category',
        'category_label',
        'description',
        'impact',
        'users_metric',
        'tech_stack',
        'image',
        'live_url',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
}
