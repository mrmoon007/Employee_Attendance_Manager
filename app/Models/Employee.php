<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $guard = 'employee';

    protected $fillable = [
        'first_name',
        'email', 
        'full_name',
        'sso_account_id',
        'sso_service',
        'password',
        'status'
    ];


    protected $hidden = [
      'password', 
      'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
      'password' => 'hashed',
  ];
}
