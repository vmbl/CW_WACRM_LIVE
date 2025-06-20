<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadStatus extends Model
{
    use HasFactory, SoftDeletes;
   protected $connection = 'mongodb';
    protected $collection = 'status';

    protected $fillable = [
        'name',
        'description',
        'color',
        'type',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Scope for active statuses
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for inactive statuses
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    // Scope to order by sort_order
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    // Get badge class based on type
    public function getBadgeClassAttribute()
    {
        return match($this->type) {
            'open' => 'badge-info',
            'closed' => 'badge-success',
            'lost' => 'badge-danger',
            default => 'badge-secondary'
        };
    }

    // Get formatted created date
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('M d, Y') : 'N/A';
    }
}