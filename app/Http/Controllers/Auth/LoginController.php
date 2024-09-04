<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
     
    switch(Auth::user()->role){
        case 1:
            $this->redirectTo = '/superadmin';
            \LogActivity::addToLog('Login');
            return $this->redirectTo;
            break;

        case 2:
            $this->redirectTo = '/cooperative';
            \LogActivity::addToLog('Login');
            return $this->redirectTo;
            break;

        case 3:
            $this->redirectTo = '/merchant';
            \LogActivity::addToLog('Login');
            return $this->redirectTo;
            break;
        
        case 4:
            $this->redirectTo = '/checkout';
            \LogActivity::addToLog('Login');
            return $this->redirectTo;
            break;
        
        case 33:
            $this->redirectTo = '/fmcg';
            \LogActivity::addToLog('Login');
            return $this->redirectTo;
            break;

        default:
            $this->redirectTo = 'login';
            return $this->redirectTo;
        }

}

}//class
