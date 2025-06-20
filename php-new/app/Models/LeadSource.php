<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadSource extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';
    protected $table = 'lead_sources';

    protected $fillable = [
        'name',
        'description',
        'color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relationship with leads (if you have a leads table)
     */
    public function leads()
    {
        return $this->hasMany(\App\Models\Lead::class, 'source_id');
    }

    /**
     * Scope for active sources
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get formatted color with # prefix if needed
     */
    public function getFormattedColorAttribute()
    {
        $color = $this->color;
        if (!str_starts_with($color, '#')) {
            return '#' . $color;
        }
        return $color;
    }
}