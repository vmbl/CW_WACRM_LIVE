<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Lead extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
    protected $collection = 'leads';
    
    // Disable Laravel's default timestamps since we're using custom fields
    public $timestamps = false;
    
    protected $fillable = [
        'lead_name',
        'lead_source',
        'other_source',
        'company_name',
        'company_id',
        'company_image',
        'company_address',
        'mobile_no',
        'alt_mobile_no',
        'phone',
        'email',
        'lead_owner',
        'tags',
        'status',
        'stage',
        'city',
        'state',
        'pincode',
        'address1',
        'address2',
        'notes',
        'dispositions',
        'created_by',
        'updated_by',
        'created_date',
        'updated_date'
    ];
    
    protected $casts = [
        'status' => 'integer',
        'created_date' => 'datetime',
        'updated_date' => 'datetime',
        'tags' => 'array'
    ];
    
    protected $dates = [
        'created_date',
        'updated_date'
    ];
    
    // Boot method to set default values
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (!$model->created_date) {
                $model->created_date = Carbon::now();
            }
            if (!$model->updated_date) {
                $model->updated_date = Carbon::now();
            }
            
            // Convert tags string to array if it's a string
            if (isset($model->tags) && is_string($model->tags)) {
                $model->tags = array_filter(array_map('trim', explode(',', $model->tags)));
            }
        });
        
        static::updating(function ($model) {
            $model->updated_date = Carbon::now();
            
            // Convert tags string to array if it's a string
            if (isset($model->tags) && is_string($model->tags)) {
                $model->tags = array_filter(array_map('trim', explode(',', $model->tags)));
            }
        });
    }
    
    // Accessor for formatted created date
    public function getFormattedCreatedDateAttribute()
    {
        return $this->created_date ? $this->created_date->format('d M Y, h:i A') : '';
    }
    
    // Accessor for tags as string
    public function getTagsStringAttribute()
    {
        return is_array($this->tags) ? implode(', ', $this->tags) : $this->tags;
    }
    
    // Scope for active leads
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    
    // Scope for inactive leads
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    
    // Scope for searching leads
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('lead_name', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('mobile_no', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('lead_owner', 'like', "%{$search}%");
            });
        }
        return $query;
    }
    
    // Scope for filtering by stage
    public function scopeByStage($query, $stage)
    {
        if ($stage) {
            return $query->where('stage', $stage);
        }
        return $query;
    }
    
    // Scope for filtering by lead source
    public function scopeBySource($query, $source)
    {
        if ($source) {
            return $query->where('lead_source', $source);
        }
        return $query;
    }
    
    // Scope for filtering by lead owner
    public function scopeByOwner($query, $owner)
    {
        if ($owner) {
            return $query->where('lead_owner', $owner);
        }
        return $query;
    }
    
    // Scope for filtering by city
    public function scopeByCity($query, $city)
    {
        if ($city) {
            return $query->where('city', $city);
        }
        return $query;
    }
    
    // Scope for filtering by state
    public function scopeByState($query, $state)
    {
        if ($state) {
            return $query->where('state', $state);
        }
        return $query;
    }
    
    // Scope for date range filtering
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return $query->whereBetween('created_date', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
        }
        return $query;
    }
    
    // Scope for recent leads (last 30 days)
    public function scopeRecent($query)
    {
        return $query->where('created_date', '>=', Carbon::now()->subDays(30));
    }
    
    // Method to get lead status text
    public function getStatusTextAttribute()
    {
        return $this->status === 1 ? 'Active' : 'Inactive';
    }
    
    // Method to get full address
    public function getFullAddressAttribute()
    {
        $addressParts = array_filter([
            $this->address1,
            $this->address2,
            $this->city,
            $this->state,
            $this->pincode
        ]);
        
        return implode(', ', $addressParts);
    }
    
    // Method to format mobile number
    public function getFormattedMobileAttribute()
    {
        if ($this->mobile_no) {
            // Format as +91-XXXXX-XXXXX for Indian numbers
            if (strlen($this->mobile_no) === 10) {
                return '+91-' . substr($this->mobile_no, 0, 5) . '-' . substr($this->mobile_no, 5);
            }
        }
        return $this->mobile_no;
    }
    
    // Static method to get lead stages
    public static function getStages()
    {
        return [
            'new' => 'New',
            'contacted' => 'Contacted',
            'qualified' => 'Qualified',
            'proposal' => 'Proposal',
            'negotiation' => 'Negotiation',
            'closed_won' => 'Closed Won',
            'closed_lost' => 'Closed Lost'
        ];
    }
    
    // Static method to get lead sources
    public static function getSources()
    {
        return [
            'website' => 'Website',
            'referral' => 'Referral',
            'social_media' => 'Social Media',
            'cold_call' => 'Cold Call',
            'email' => 'Email Campaign',
            'advertisement' => 'Advertisement',
            'trade_show' => 'Trade Show',
            'other' => 'Other'
        ];
    }
    
    // Method to check if lead is hot (recent and in active stage)
    public function isHot()
    {
        $hotStages = ['qualified', 'proposal', 'negotiation'];
        return $this->status === 1 && 
               in_array($this->stage, $hotStages) && 
               $this->created_date >= Carbon::now()->subDays(7);
    }
    
    // Method to get lead priority based on stage and recency
    public function getPriorityAttribute()
    {
        if ($this->isHot()) {
            return 'High';
        } elseif (in_array($this->stage, ['contacted', 'qualified']) && $this->status === 1) {
            return 'Medium';
        } else {
            return 'Low';
        }
    }
    
    
    // Relationship with User model for lead owner (if you have a User model)
    // public function owner()
    // {
    //     return $this->belongsTo(User::class, 'lead_owner', 'id');
    // }
    
    // Relationship with Company model (if you have a Company model)
    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_id', '_id');
    // }
}