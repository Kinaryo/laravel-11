<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('login', ['title' => 'login']);
    }

    public function authenticate(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');  // redirect ke home setelah login
        }
    
        return back()->with('error','Login gagal');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function viewRegister()
    {
        return view('register', ['title' => 'register']);
    }

    public function storeRegister(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:200'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);


        return redirect('/login')
            ->with('success', 'Register Berhasil, Silahkan Login');
    }
}
