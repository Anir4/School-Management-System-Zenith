<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if(Auth::check()){
            if(Auth::user()->type == 'admin')
                {
                    return redirect('admin/dashboard');
                }
                if(Auth::user()->type == 'prof')
                {
                    return redirect('prof/dashboard');
                }
                if(Auth::user()->type == 'etudiant')
                {
                    return redirect('etudiant/dashboard');
                }
        }else{
        return view('welcome');}
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
       ]);
//  dd(Hash::make('123'));

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                if(Auth::user()->type == 'admin')
                {
                    return redirect('admin/dashboard');
                }
                if(Auth::user()->type == 'prof')
                {
                    return redirect('prof/dashboard');
                }
                if(Auth::user()->type == 'etudiant')
                {
                    return redirect('etudiant/dashboard');
                }
        }
else {
        return redirect('/login')->with(
            'error', 'email ou mot de pass incorrect',
        );}
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(url('/'));
    }
    
}
