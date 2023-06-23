<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the user that owns the phone.
     */
    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
