<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class LeadReminder extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'reminders';

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'priority'
    ];
}
