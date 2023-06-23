<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAutheRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
    * Show admin login form.
    *
    * @return View
    */
    public function showLoginForm(): View
    {
        return view('admin.login');
    }

    /**
    * Login authenticate operation.
    *
    * @return redirectResponse
    */
    public function authenticate(AdminAutheRequest $request): RedirectResponse
    {
        $data = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($data, true)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withInput()->withErrors(['email' => __("Invalid email or password")]);
    }

    /**
     * Log out the admin.
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
