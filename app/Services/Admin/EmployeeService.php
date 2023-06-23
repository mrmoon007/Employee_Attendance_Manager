<?php

namespace App\Services\Admin;

use App\Models\Employee;
use App\Models\EmployeeContact;
use App\Models\EmployeeDetails;

class EmployeeService
{
    /**
     * Register any application services.
     */
    public function store($request): mixed
    {
        try {
            $employee  = Employee::create($request->safe()->only('first_name', 'email', 'full_name', 'password', 'status'));

            if ($request->hasFile('photo')) {
                $imageName = time() . '.' . request()->photo->extension();
                $request->photo->move(public_path('images'), $imageName);
            }

            $employeeDetails = EmployeeDetails::create([
                'photo' => $imageName ?? ' ',
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'employee_id' => $employee->id,
            ]);

            foreach ($request->contacts as $key => $contact) {
                $employeeContacts[] = EmployeeContact::create([
                    'contact_name' => $contact['contact_name'],
                    'contact_email' => $contact['contact_email'],
                    'employee_id' => $employee->id
                ]);
            }

            return true;

        } catch (\Throwable $th) {
            
            return false;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
