<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin/dashboard');
            } else if ($user->level == 'user') {
                return redirect()->intended('posts');
            }
        }
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential)) {
            $user =  Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('posts');
            } else if ($user->level == 'user') {
                return redirect()->intended('posts');
            }
            return redirect()->intended('/');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'username' => 'required|unique:users|regex:/^\S*$/|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'username.regex' => 'Username tidak boleh mengandung spasi.',
            'name.min' => 'Name minimal harus terdiri dari 5 karakter.',
            'username.min' => 'Username minimal harus terdiri dari 8 karakter.',
            'password.min' => 'Password minimal harus terdiri dari 8 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withInput()
                ->withErrors($validator);
        }

        $request['level'] = 'user';
        $request['password'] = bcrypt($request->password);
        User::create($request->only(['name', 'username', 'email', 'password', 'level']));

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return Redirect('/');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function prosesForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $password = rand(10000000, 99999999);
            $user->password = Hash::make($password);
            $user->save();

            // Kirim Email
            // Mail::to($user->email)->send(new ForgotPassword($password));

            return redirect()->route('login')->with('success', 'Password baru telah dikirim ke email Anda.');
        }

        return redirect()->back()->with('error', 'Email tidak ditemukan.');
    }
}
