<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    public function login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            // Get the authenticated user
             $user = Auth::user();
          

            // Determine the user's role
            $userType = $user->role;

            // Redirect the user to the appropriate dashboard based on their role
            switch ($userType){
                case 'superadmin':
                    return redirect()->route('superadmins');
                case 'showroomincharge':
                    return redirect()->route('showroominchar');          
                default:
                    return redirect()->route('login');
            }

            } else {
            // Authentication failed, redirect the user back to the login form with an error message
            return redirect()->back()->withErrors(['Invalid email or password']);
            }

    }
}
