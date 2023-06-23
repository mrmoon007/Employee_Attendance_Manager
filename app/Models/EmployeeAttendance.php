<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date', 
        'check_in_time',
        'check_out_time',
        'status',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
