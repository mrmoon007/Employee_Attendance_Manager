<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Socialite;

class LoginController extends Controller
{

    /**
     * Employee login form
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('employee.login');
    }

     /**
     * Login authenticate operation.
     *
     * @return redirectResponse
     */
    public function authenticate(AuthRequest $request): RedirectResponse
    {
        $data = $request->only('email', 'password');

        if (Auth::guard('employee')->attempt($data, false)) {
            $request->session()->regenerate();
            return redirect()->intended('employee/dashboard');
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
     * @return RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
    
            $employee = Socialite::driver('google')->user();

            $finduser = Employee::updateOrCreate([
                'email' => $employee->email,
            ], [
                'email' => $employee->email,
                'full_name' => $employee->name,
                'sso_account_id'=> $employee->id,
                'sso_service'=> 'google',
                'status'=> 'Active',
                'password' => Hash::make('secret')
            ]);

            Auth::guard('employee')->loginUsingId($finduser->id);
            return redirect()->route('employee.dashboard');
    
        } catch (\Exception $e) {
            redirect()->route('login');
        }
    }


    /**
     * Log out the employee.
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}


