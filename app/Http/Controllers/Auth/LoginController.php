<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::user()->role == 0) {
            return '/user-dashboard';
        } elseif (Auth::user()->role == 1) {
            return '/admin/dashboard';
        }
        return '/login';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Show custom user login view
    public function userLogin()
    {
        return view('auth.userlogin');
    }


    public function logout(Request $request)
    {
        $role = Auth::user()->role;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($role == 0) {
            return redirect('/user-login');
        } else {
            return redirect('/login');
        }
    }


    /**
     * Override the credentials method to include role in the authentication process.
     */
    protected function credentials(Request $request)
    {
        // Get the credentials with the role check
        return [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role, // Make sure the role is included in the login form
        ];
    }

    /**
     * Override the authenticated method if you want custom post-login actions.
     */
    protected function authenticated(Request $request, $user)
    {
        // Custom actions after login, e.g., flash messages
        session()->flash('success', 'You are logged in!');
    }
}
