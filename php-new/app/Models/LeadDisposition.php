<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadDisposition extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'mongodb';
    protected $table = 'lead_dispositions';


    protected $fillable = [
        'name',
        'description',
        'type',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Valid disposition types
     */
    const TYPES = [
        'positive' => 'Positive',
        'negative' => 'Negative',
        'neutral' => 'Neutral'
    ];

    /**
     * Relationship with leads (if you have a leads table)
     */
    public function leads()
    {
        return $this->hasMany(\App\Models\Lead::class, 'disposition_id');
    }

    /**
     * Scope for active dispositions
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for specific type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get formatted type name
     */
    public function getTypeNameAttribute()
    {
        return self::TYPES[$this->type] ?? ucfirst($this->type);
    }

    /**
     * Boot method to handle events
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-assign sort order when creating
        static::creating(function ($model) {
            if (is_null($model->sort_order)) {
                $model->sort_order = static::max('sort_order') + 1;
            }
        });
    }
}