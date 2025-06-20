<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Leads extends Model
{
    //
   
    protected $connection = 'mongodb';
    protected $collection = 'leads';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'source',
        'status',
        'notes',
        'interested_in',
        'assigned_to',
        'tags',
        'custom_fields',
        'owner'
    ];

}
