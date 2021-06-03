<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
/*
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   /* protected $redirectTo = '/inicio';*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    protected function authenticated()
    {
        if (Auth::user()->id_role==1) {
            return redirect('/administrador') ;
        } else {
            return redirect('/inicio');
        }
    }

    /*Función que hace que al desloguearse el usuario que ha iniciado sesión se vaya a /inicio*/
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/inicio');
    }
}
