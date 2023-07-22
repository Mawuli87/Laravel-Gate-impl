<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->only('login','index');//protect all of them except guest can login
        $this->middleware('auth')->only('logout');//only authenticated can access this logout page
    }

    function index(){
     return view('auth.login');
    }

    function save(Request $request){
            $request->validate([
            
                'email'=> ['email','required'],
                'password'=>['required','min:6'],

            ]);

            try {
             Auth::attempt($request->only('email','password'));
             $request->session()->regenerate();
             return redirect()->route('dashboard');
            }catch(Exception $e){
             return redirect()->back()->with('msg','Error Logging in');
            }
    }


    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
