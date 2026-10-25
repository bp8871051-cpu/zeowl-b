<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_role',
        'company',
        'content',
        'rating',
        'avatar',
        'pdf',
        'project_name',
        'order',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = [
        'role',
        'quote',
        'pdf_url',
    ];

    /**
     * Get the full public URL for uploaded PDF
     */
    public function getPdfUrlAttribute(): ?string
    {
        if (!$this->pdf) {
            return null;
        }
        if (str_starts_with($this->pdf, 'http://') || str_starts_with($this->pdf, 'https://') || str_starts_with($this->pdf, '/')) {
            return $this->pdf;
        }
        return asset('storage/' . $this->pdf);
    }

    /**
     * Backward-compatible accessor & mutator for role <-> client_role
     */
    public function getRoleAttribute(): ?string
    {
        return $this->client_role;
    }

    public function setRoleAttribute(?string $value): void
    {
        $this->attributes['client_role'] = $value;
    }

    /**
     * Backward-compatible accessor & mutator for quote <-> content
     */
    public function getQuoteAttribute(): ?string
    {
        return $this->content;
    }

    public function setQuoteAttribute(?string $value): void
    {
        $this->attributes['content'] = $value;
    }
}
