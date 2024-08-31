<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ユーザーモデルをインポート
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        // バリデーション
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        // 認証試行
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
    
        // 認証失敗時
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture_url' => 'http://i.imgur.com/Qr71crq.jpg',
        ]);

        Auth::login($user);

        return redirect()->route('home'); // ホームページへのリダイレクト
    }
}
