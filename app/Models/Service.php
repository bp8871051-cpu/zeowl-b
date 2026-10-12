<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'slug',
        'title',
        'eyebrow',
        'short_desc',
        'full_desc',
        'card_type',
        'theme',
        'accent_color',
        'tags',
        'image',
        'metrics',
        'deliverables',
        'technologies',
        'process',
        'faqs',
        'order',
        'is_active',
    ];

    protected $casts = [
        'tags' => 'array',
        'metrics' => 'array',
        'deliverables' => 'array',
        'technologies' => 'array',
        'process' => 'array',
        'faqs' => 'array',
        'is_active' => 'boolean',
    ];
}
