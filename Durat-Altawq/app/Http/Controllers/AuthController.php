<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
        public function showLoginForm()
        {
            return view('admin.login');
        }

        public function login(LoginRequest $request)
        {
            $credentials = $request->only('email', 'password');

            if(auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))->with('success', 'تم تسجيل الدخول بنجاح.');
            }

            return back()->withErrors(['email' => 'بيانات الاعتماد غير صحيحة.'])->onlyInput('email');

            }

        public function logout(Request $request)
        {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح.');
        }
}
