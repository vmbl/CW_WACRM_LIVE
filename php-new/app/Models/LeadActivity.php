<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class LeadActivity extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'activities'; // MongoDB collection name
    
    protected $fillable = [
        'lead_id',
        'activity',
        'description',
        'performed_by',
        'metadata',
        'created_at'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    /**
     * Create a new activity record
     */
    public static function logActivity($leadId, $activity, $description = null, $metadata = [])
    {
        return self::create([
            'lead_id' => $leadId,
            'activity' => $activity,
            'description' => $description,
            'performed_by' => auth()->id() ?? 'system',
            'metadata' => $metadata,
            'created_at' => now()
        ]);
    }
    
    /**
     * Get activities for a specific lead
     */
    public static function getLeadActivities($leadId, $limit = 50)
    {
        return self::where('lead_id', $leadId)
                   ->orderBy('created_at', 'desc')
                   ->limit($limit)
                   ->get();
    }
    
    /**
     * Relationship with Lead model
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}