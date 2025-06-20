<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class LeadDocument extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
    protected $collection = 'lead_documents';
    
    protected $fillable = [
        'lead_id',
        'original_name',
        'file_name',
        'file_size',
        'mime_type',
        'extension',
        'description',
        's3_url',
        's3_key',
        's3_bucket',
        'uploaded_by',
        'uploaded_date',
        'is_active',
        'document_type',
        'deleted_at',
        'deleted_by'
    ];
    
    protected $dates = [
        'uploaded_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'file_size' => 'integer'
    ];
    
    /**
     * Boot method to add LeadActivity logging
     */
    protected static function boot()
    {
        parent::boot();
        
        // Log when document is created
        static::created(function ($document) {
            LeadActivity::logActivity(
                $document->lead_id,
                'Document Uploaded',
                "Document '{$document->original_name}' was uploaded",
                [
                    'file_name' => $document->original_name,
                    'file_size' => $document->file_size,
                    'file_type' => $document->extension,
                    'document_type' => $document->document_type,
                    's3_url' => $document->s3_url
                ]
            );
        });
        
        // Log when document is updated
        static::updated(function ($document) {
            // Check if document was soft deleted
            if ($document->isDirty('is_active') && !$document->is_active) {
                LeadActivity::logActivity(
                    $document->lead_id,
                    'Document Deleted',
                    "Document '{$document->original_name}' was deleted",
                    [
                        'file_name' => $document->original_name,
                        's3_key' => $document->s3_key
                    ]
                );
            }
        });
    }
    
    /**
     * Relationship with Lead model
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}