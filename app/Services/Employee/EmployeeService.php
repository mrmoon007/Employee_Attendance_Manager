<?php

namespace App\Services\Employee;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeContact;
use App\Models\EmployeeDetails;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class EmployeeService
{
    /**
     * Employee punch in.
     */
    public function punchIn(): mixed
    {
        try {
            $employee = Auth::guard('employee')->user();
            $schedule = Schedule::first();

            $attendance = new EmployeeAttendance;
            $attendance->employee_id = $employee->id;
            $attendance->check_in_time = date("Y-m-d H:i:s");
            $attendance->date = date("Y-m-d");

            if (!($schedule?->time_in >= $attendance->attendance_time)) {
                $attendance->status = 'late';
            };
            $attendance->status = 'present';
            $attendance->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Employee punch out.
     */
    public function punchOut(): mixed
    {
        try {
            $employee = Auth::guard('employee')->user();
            $attendance = EmployeeAttendance::where('date', date("Y-m-d"))->whereEmployee_id($employee->id)->latest()->first();
            $attendance->check_out_time = date("Y-m-d H:i:s");
            $attendance->save();

            return true;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }
}
