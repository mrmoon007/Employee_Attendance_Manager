<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'gender', 
        'date_of_birth',
        'address',
        'employee_id',
    ];
}
