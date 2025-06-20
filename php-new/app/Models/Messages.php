<?php
// app/Models/Message.php
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Messages extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'messages';
    
    //msginitby - system/user
    protected $fillable = ['from', 'to', 'message', 'type', 'read', 'msginitby', 'customername', 'systemuser'];
}