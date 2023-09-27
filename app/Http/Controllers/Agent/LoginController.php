<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function agent_login()
    {
        return view('agent.login');
    }

    public function process_login(Request $request){
        $this->validateLogin($request);
        
        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return redirect()->intended(route('agent.dashboard'));
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
    
    protected function attemptLogin(Request $request)
    {
        return Auth::guard('agent')->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }
    
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    public function logout(){
        Auth::guard('agent')->logout();
        return redirect()->route('agent.login');
    }
}