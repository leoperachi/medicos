<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->setClient();
        $credentials = $request->only('email', 'password');
        $u = new User();
        $u->email = $credentials['email'];
        Auth::login($u);
        if(Auth::attempt($credentials)){            
            $request->session()->put('authenticated',true);
            $request->session()->put('user', $credentials['email']);
            $request->session()->put('auth',Auth::user()->auth);

            $response = $this->client->request('GET', 'user', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Auth::user()->auth->access_token
            ]]);
            $user = json_decode($response->getBody());
            $request->session()->put('apiUser',$user);

            return redirect('/home');
        }

        return redirect('/login');
    }

    public function logout(Request $request) {
        //remove authenticated from session and redirect to login
        $request->session()->forget('authenticated');
        $request->session()->forget('user');
        $request->session()->forget('apiUser');
        return redirect("/login");
    }
}
