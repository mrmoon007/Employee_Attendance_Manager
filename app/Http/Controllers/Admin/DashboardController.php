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
        $data['lateEmployee'] = EmployeeAttendance::where('date', date('Y-m-d'))->whereStatus('Late')->count();
        $data['presentEmployee'] =EmployeeAttendance::where('date', date('Y-m-d'))->whereStatus('Present')->count();
        return view('admin.dashboard', $data);
    }

    /**
     * Display attendance list.
     */
    public function attendanceList(Request $request) : View
    {
        $attendances = EmployeeAttendance::with('employee:id,full_name')->latest('employee_attendances.id')->paginate(10);
        return view('admin.employee.attendance-list', compact('attendances'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
