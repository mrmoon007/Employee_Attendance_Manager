<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

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
    public function index()
    {
        return view('employee.dashboard');
    }

    /**
     * Employee punch in
     */
    public function punchIn()
    {
        $this->employeeService->punchIn();
        return redirect()->back();
    }

    /**
     * Employee punch out 
     */
    public function punchOut()
    {
        $this->employeeService->punchOut();
        return redirect()->back();
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
