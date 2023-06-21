<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $guard = 'employee';

    protected $fillable = [
        'name',
        'email', 
        'password',
    ];


    protected $hidden = [
      'password', 
      'remember_token',
    ];
}
