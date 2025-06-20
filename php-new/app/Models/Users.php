<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Users extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, Notifiable;
    
    protected $connection = 'mongodb';
    protected $collection = 'users';

    // ... rest of your model ...
    protected $fillable = ['name', 'email', 'password'];
}
