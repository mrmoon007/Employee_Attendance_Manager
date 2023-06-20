<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;

class LoginController extends Controller
{
     /**
     * Login authenticate operation.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function authenticate(AuthRequest $request)
    {
        $data = $request->only('email', 'password');
        $userData = Employee::where('email', $data['email'])->first();

        if (!Hash::check($data['password'], $userData->password)) {

            return back()->withInput()->withErrors(['error' => __("Invalid User")]);
        }

        if (Auth::guard('user')->attempt($data)) {

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

}


