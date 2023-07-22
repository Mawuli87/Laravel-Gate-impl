<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    //
    function display(){
      $users = User::all();
      return view('dashboard.users.index',compact(['users']));
    }

    function create(){
        $roles = Role::all();
        return view('dashboard.users.create',compact('roles'));
    }

    function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'email'=> ['email','required','unique:users'],
            'password'=>['required','min:6','confirmed'],

        ]);

        try {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password)
         ]);

         $user->roles()->syncWithoutDetaching($request->roles,[]);

         return redirect()->route('user.display')->with('msg','User has been created successfully');
        }catch(Exception $e){
         return redirect()->back()->with('msg','User not registered');
        }
    }

    function attachRoles($id){
         $user = User::find($id);
         $roles = [2,3,4];
         $user->roles()->syncWithoutDetaching($roles);
    }
}
