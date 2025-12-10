<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (!Auth::user()->is_admin) {
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized access.']);
            }

            // return redirect()->intended('/admin');
            // return redirect()->away('https://' . env('ADMIN_DOMAIN', 'dashboard.mysite.net'));
            return redirect()->away(route('admin.dashboard'));
        }

        return back()->withErrors([
            'error' => 'معلومات الدخول غير صحيحة.',
        ]);
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'old_pw' => ['required'],
            'new_pw' => ['required', 'min:6'],
            'new_pw_confirmation' => ['required', 'same:new_pw'],
        ]);

        $user = Auth::user();

        
        if (!Hash::check($request->old_pw, $user->password)) {
            return back()->withErrors(['old_pw' => 'كلمة المرور الحالية غير صحيحة'.$user->password]);
        }

        
        $user->update([
            'password' => Hash::make($request->new_pw)
        ]);

        return back()->with('pw_success', 'غُيِّرت كلمة المرور');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
