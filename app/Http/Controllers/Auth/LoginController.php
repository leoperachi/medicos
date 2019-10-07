<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;

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

        try{
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:8001/api/',
            ]);
    
            $response = $client->post('login', ['form_params' => [
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ]]);
        } catch(\GuzzleHttp\Exception\ClientException $e) {

        }
        
        $auth = json_decode($response->getBody());
        $user = new User();
        $user->email = $credentials['email'];
        $user->auth = $auth;
        $request->session()->put('authenticated',true);
        $request->session()->put('user', $user);

        return redirect('home');
    }

    public function logout(Request $request) {
        //remove authenticated from session and redirect to login
        $request->session()->forget('authenticated');
        $request->session()->forget('user');
        return redirect("/login");
    }
}
