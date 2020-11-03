<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * override redirect after login
     *
     * @return string
     **/
    protected function redirectTo()
    {
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin') {
            return 'admin/dashboard';
        }
        else {
            return 'my-account';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
