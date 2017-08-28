<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Auth\Authentication;

class AuthController extends Controller
{
    private $auth;

    public function __construct(Authentication $auth) {
        $this->auth = $auth;
    }

	public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = (bool) $request->get('remember_me', false);

        $error = $this->auth->login($credentials, $remember);
        if ( !$error ) {
            return redirect()->intended(route('dashboard.index'));
        }

        return redirect()->back()->withInput();
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect()->route('user.getLogin');
    }

}
