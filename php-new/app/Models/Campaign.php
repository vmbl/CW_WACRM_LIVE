<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Campaign extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
    protected $collection = 'campaign';

    protected $fillable = [
        'campaign_name',
        'template_id',
        'group_id',
        'campaign_type',
        'execution_type',
        'scheduled_at',
        'description',
        'status',
        'recipients',
        'messages_sent',
        'messages_delivered',
        'messages_read'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'recipients' => 'integer',
        'messages_sent' => 'integer',
        'messages_delivered' => 'integer',
        'messages_read' => 'integer'
    ];

    // Relationships
    public function template()
    {
        return $this->belongsTo(WhatsAppTemplate::class, 'template_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}

class WhatsAppTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'status'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'template_id');
    }
}

class ContactGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'contacts_count'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'group_id');
    }
}