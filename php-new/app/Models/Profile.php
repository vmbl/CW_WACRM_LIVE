<?php

namespace App\Models;

// use Jenssegers\Mongodb\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone_number',
        'address',
        'country',
        'state',
        'city',
        'postal_code',
        'profile_image',
        'profile_image_base64',
        'bio',
        'date_of_birth',
        'gender',
        'website',
        'linkedin_url',
        'twitter_url',
        'facebook_url',
        'instagram_url',
        'job_title',
        'company',
        'department',
        'employee_id',
        'hire_date',
        'salary',
        'skills',
        'languages',
        'education',
        'certifications',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'hire_date' => 'date',
        'skills' => 'array',
        'languages' => 'array',
        'education' => 'array',
        'certifications' => 'array',
        'is_active' => 'boolean',
        'salary' => 'decimal:2'
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full name attribute.
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the profile image or default avatar.
     */
    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image_base64) {
            return $this->profile_image_base64;
        }
        
        return asset('build/img/profiles/avatar-02.jpg');
    }

    /**
     * Get formatted address.
     */
    public function getFormattedAddressAttribute()
    {
        $address = $this->address;
        if ($this->city) {
            $address .= ', ' . $this->city;
        }
        if ($this->state) {
            $address .= ', ' . $this->state;
        }
        if ($this->postal_code) {
            $address .= ' ' . $this->postal_code;
        }
        if ($this->country) {
            $address .= ', ' . $this->country;
        }
        
        return $address;
    }

    /**
     * Scope to get active profiles.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get profile completion percentage.
     */
    public function getCompletionPercentageAttribute()
    {
        $fields = [
            'first_name', 'last_name', 'username', 'phone_number', 
            'address', 'country', 'state', 'city', 'postal_code',
            'bio', 'date_of_birth', 'job_title', 'company'
        ];
        
        $filledFields = 0;
        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $filledFields++;
            }
        }
        
        return round(($filledFields / count($fields)) * 100);
    }
}