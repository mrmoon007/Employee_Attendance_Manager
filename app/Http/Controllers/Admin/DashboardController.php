<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $data['totalEmployee'] = Employee::count();
        $data['activeEmployee'] = Employee::whereStatus('active')->count();
        $data['lateEmployee'] = EmployeeAttendance::where('date', date('Y-m-d'))->whereStatus('Late')->distinct()->count('employee_id');
        $data['presentEmployee'] =EmployeeAttendance::where('date', date('Y-m-d'))->whereStatus('Present')->distinct()->count('employee_id');
        return view('admin.dashboard', $data);
    }

    /**
     * Display attendance list.
     */
    public function attendanceList(Request $request) : View
    {
        $attendances = EmployeeAttendance::with('employee:id,full_name')->where('date', date('Y-m-d'))->latest('employee_attendances.id')->paginate(10);
        return view('admin.employee.attendance-list', compact('attendances'));
    }
}
