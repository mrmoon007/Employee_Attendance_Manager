<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeStoreRequest;
use App\Models\Employee;
use App\Services\Admin\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
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
        $employees = Employee::with('details', 'contacts')->latest()->paginate(5);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        $this->employeeService->store($request);

        return to_route('admin.employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with('details', 'contacts')->find($id);
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.employee.edit');
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
        $employee = Employee::find($id);

        if($employee?->details?->photo && file_exists(public_path('images/'.$employee?->details?->photo))){
            unlink(public_path('images/'.$employee?->details?->photo));
        };

        // if ($employee?->details?->photo) {
        //     Storage::disk('public')->delete('images/'.$employee?->details?->photo);
        // }

        $employee->delete();

        return to_route('admin.employee.index');
    }
}
