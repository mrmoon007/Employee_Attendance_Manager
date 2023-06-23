<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * 
     */
    public $employeeService;

    /**
     * Constructor for employee controller
     */
    public function __construct(EmployeeService $employeeService) 
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('employee.dashboard');
    }

    /**
     * Employee punch in
     */
    public function punchIn(): RedirectResponse
    {
        $this->employeeService->punchIn();
        return redirect()->back();
    }

    /**
     * Employee punch out 
     */
    public function punchOut():RedirectResponse
    {
        $this->employeeService->punchOut();
        return redirect()->back();
    }

    /**
     * Display attendance list.
     */
    public function attendanceList():View
    {
        $attendances = EmployeeAttendance::with('employee:id,full_name')->where('employee_id', Auth::guard('employee')->user()?->id)->latest('employee_attendances.id')->paginate(10);
        return view('employee.attendence-list', compact('attendances'));
    }
}
