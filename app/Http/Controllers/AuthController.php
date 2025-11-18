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
            'email' => 'معلومات الدخول غير صحيحة.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
