<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'min:3', 'max:191'],
            'full_name' =>  ['required', 'min:3', 'max:191'],
            'email' => ['required', 'max:191', 'unique:employees,email,' . $this->id],
            "password" => ['required', 'max:191'],
            'phone' => ['nullable', 'max:45', 'regex:/^[0-9\-\,]*$/'],
            'birthday' => ['nullable', 'regex:/^[0-9]{1,4}[\/\-\.]{1}[0-9]{1,2}[\/\-\.]{1}[0-9]{1,4}$/'],
            'address' => ['nullable', 'max:200'],
            'gender' => ['nullable', 'max:6', 'in:male,female'],
            'photo'  => ['nullable', 'image', 'mimes:jpeg,png,jpg','max:2048'],
            "contact_email" => ['nullable', 'max:191'],
            "contact_name" => ['nullable', 'min:3', 'max:191'],
            "status" => ['required', 'in:active,inactive'],
        ];
    }

}
