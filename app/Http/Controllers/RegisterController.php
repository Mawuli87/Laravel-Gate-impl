<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('guest');
    }

    function index(){
     return view('auth.register');
    }

    function save(Request $request){
            $request->validate([
                'name' => ['required'],
                'email'=> ['email','required','unique:users'],
                'password'=>['required','min:6','confirmed'],

            ]);

            try {
             User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->password)
             ]);
             Auth::attempt($request->only('email','password'));
             return redirect()->route('dashboard')->with('msg','User has been registered successfully');
            }catch(Exception $e){
             return redirect()->back()->with('msg','User not registered');
            }
    }
}
