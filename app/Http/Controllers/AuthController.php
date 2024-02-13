<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('register');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'nullable|email:rfc,dns|unique:users,email',
            'password'  => 'required|min:6',
        ]);


            $user = new User();
            $user->email         = $request->email;
            $user->password      = bcrypt($request->password);
            
            $user->save();
            Auth::login($user);

            return redirect()->route('login')->with('success', 'Register Succed');
        

    }


    public function loginPage()
    {
        return view('login');
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('register')->with('error', 'Email not found');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('register')->with('error', 'Invalid password');
        }
        return redirect()->route('register')->with('error', 'Invalid login credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
