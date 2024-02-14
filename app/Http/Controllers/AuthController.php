<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Office;


class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        Auth::login($user);
        $user->assignRole('leader');
        $username = $user->name; 
        return redirect('/dashboard');
    }

    public function login(Request $request)
    {   
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|string',
        ]);
            //check
        if (Auth::attempt($request->only('email' , 'password'))) {
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'wrong' => 'error , email or password does not exists'
        ]);
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/dashboard');
    }

    public function profile(Office $office)
    {
        $user = User::where('id' , 'like' , Auth::user()->id)->first();
        $office = Office::where('user_id' , 'like' , $user->id)->get();
        return view('auth.user-setting' , [
            'user' => $user,
            'office' => $office
        ]);
    }
}
