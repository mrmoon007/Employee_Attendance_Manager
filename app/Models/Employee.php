<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

  /**
   * Get the phone associated with the user.
   */
  public function details(): HasOne
  {
    return $this->hasOne(EmployeeDetails::class);
  }

  /**
   * Get the comments for the blog post.
   */
  public function contacts(): HasMany
  {
    return $this->hasMany(EmployeeContact::class);
  }

  /**
   * Get the comments for the blog post.
   */
  public function attendences(): HasMany
  {
    return $this->hasMany(EmployeeAttendance::class);
  }
}
