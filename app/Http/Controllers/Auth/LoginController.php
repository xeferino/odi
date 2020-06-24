<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->hasRole('admin'))
                return redirect()->route('admin.home');
            else
                if(isset($request->returnUrl) && isset(parse_url($request->returnUrl)["host"]) && parse_url($request->returnUrl)["host"] == $request->getHttpHost())
                    return redirect()->to($request->returnUrl);
                else 
                    return redirect()->route('store.catalogue');       
        } else {
            return redirect()->back()->withInput($request->input());
        }   
        
    }

    public function showLoginForm() {
        return view('admin.login');
    }
}
