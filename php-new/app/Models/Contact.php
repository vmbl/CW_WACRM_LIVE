<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Contact extends Eloquent
{
    /**
     * The connection name for the model.
     */
    protected $connection = 'mongodb';

    /**
     * The collection associated with the model.
     */
    protected $collection = 'contacts';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = '_id';

    /**
     * The "type" of the primary key ID.
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'mobile_no',
        'alt_mobile_no',
        'group_id',
        'city',
        'state',
        'pincode',
        'address_1',
        'address_2',
        'notes',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [];

    /**
     * Get the group that the contact belongs to.
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', '_id');
    }

    /**
     * Scope a query to only include active contacts.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope a query to only include inactive contacts.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }

    /**
     * Get the contact's full address.
     */
    public function getFullAddressAttribute()
    {
        $address = $this->address_1;
        if ($this->address_2) {
            $address .= ', ' . $this->address_2;
        }
        $address .= ', ' . $this->city . ', ' . $this->state;
        if ($this->pincode) {
            $address .= ' - ' . $this->pincode;
        }
        return $address;
    }

    /**
     * Override the find method to handle MongoDB ObjectId
     */
    public static function find($id, $columns = ['*'])
    {
        if ($id === null) {
            return null;
        }

        // Try to find with the original ID
        $model = parent::find($id, $columns);
        
        if (!$model && class_exists('\MongoDB\BSON\ObjectId')) {
            try {
                // Try to convert string to ObjectId and find again
                if (is_string($id) && strlen($id) === 24 && ctype_xdigit($id)) {
                    $objectId = new \MongoDB\BSON\ObjectId($id);
                    $model = parent::find($objectId, $columns);
                }
            } catch (\Exception $e) {
                // If conversion fails, return null
                return null;
            }
        }

        return $model;
    }

    /**
     * Override the findOrFail method to handle MongoDB ObjectId
     */
    public static function findOrFail($id, $columns = ['*'])
    {
        $result = static::find($id, $columns);

        if ($result === null) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException(
                'No query results for model [' . static::class . '] ' . $id
            );
        }

        return $result;
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return '_id';
    }

    /**
     * Convert the model instance to an array.
     */
    public function toArray()
    {
        $array = parent::toArray();
        
        // Ensure _id is always a string for JSON responses
        if (isset($array['_id']) && is_object($array['_id'])) {
            $array['_id'] = (string) $array['_id'];
        }
        
        // Also add 'id' field for compatibility
        if (isset($array['_id'])) {
            $array['id'] = $array['_id'];
        }
        
        return $array;
    }


    public function contacts()
{
    return $this->hasMany(Contact::class, 'group_id');
}

}