<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){            
            $request->session()->put('authenticated',true);
            $request->session()->put('user', $credentials['email']);
            $token = Auth::user()->auth->access_token;
           
            return redirect('/home');
        }

        return redirect('/login');
    }

    public function logout(Request $request) {
        //remove authenticated from session and redirect to login
        $request->session()->forget('authenticated');
        $request->session()->forget('user');
        return redirect("/login");
    }
}
