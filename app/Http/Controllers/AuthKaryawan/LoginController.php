<?php

namespace App\Http\Controllers\AuthKaryawan;

use App\Http\Controllers\Controller;
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

    // protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:karyawan')->except(['logout']);
    }
    public function showLoginForm()
    {
        return view ('authKaryawan.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // //attemp to log the user in
        if(Auth::guard('karyawan')->attempt($credential, $request->member)){
            //if login successful, then redirect to their intended location
            return redirect()->intended(route('karyawans.index'));
        }
        //if unseccessful, then redirect back to the login form data
        return redirect()->back()->withInput($request->only('email', 'remember'));

        // if(Auth::guard('p emilik')->attempt($credential, $request->member)){
        //  dd(Auth::guard('karyawan')->attempt($credential));
    }
}
