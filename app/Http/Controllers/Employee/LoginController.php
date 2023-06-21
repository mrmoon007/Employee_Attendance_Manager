<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;

class LoginController extends Controller
{

    public function showLoginForm() 
    {
        return view('employee.login');
    }

     /**
     * Login authenticate operation.
     *
     * @return redirectResponse
     */
    public function authenticate(AuthRequest $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::guard('employee')->attempt($data, false)) {
            return redirect()->route('employee.dashboard');
        }
        return back()->withInput()->withErrors(['email' => __("Invalid email or password")]);
    }

    /**
     * use Google driver
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * take data from Google and save in db & redirect in main page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
    
            $employee = Socialite::driver('google')->user();
     
            $finduser = Employee::where('email', $employee->email)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/home');
     
            }else{
                $newEmployee = Employee::create([
                    'full_name' => $employee->name,
                    'email' => $employee->email,
                    'sso_account_id'=> $employee->id,
                    'sso_service'=> 'google',
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newEmployee);
     
                return redirect('/home');
            }
    
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Log out the employee.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('employee')->logout();

        return redirect()->route('login');
    }

}


