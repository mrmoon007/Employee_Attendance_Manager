<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAutheRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
    * Login authenticate operation.
    *
    * @return redirectResponse
    */
    public function authenticate(AdminAutheRequest $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($data, true)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withInput()->withErrors(['email' => __("Invalid email or password")]);
    }

    /**
     * Log out the admin.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }
}
