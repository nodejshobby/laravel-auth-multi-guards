<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showUserLogin()
    {
        return view('login');
    }

    public function showUserRegister()
    {
        return view('register');
    }

    public function processUserRegister(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|alpha',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
            'confirm_password' => 'bail|required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'You have successfully registered');
    }

    public function processUserLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->has('remember_me');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return redirect()->back()->with('error', 'Invalid email or password')->onlyInput('email');
    }

    public function showUserDashboard()
    {
        return view('home');
    }

    public function userLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have successfully logout');
    }

    public function showUserProfile()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        return view('profile', ['user' => $user]);
    }

    public function updateUserProfile(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|alpha'
        ]);
        $userId = Auth::id();
        $user = User::find($userId);

        $user->name = $request->name;

        $user->save();
        return redirect('/profile')->with('success', 'Your details was successfully updated');
    }

    public function updateUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'bail|required|current_password',
            'password' => 'bail|required|min:6',
            'confirm_password' => 'bail|required|same:password',
        ]);

        $userId = Auth::id();
        $user = User::find($userId);

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/profile')->with('success', 'Your password was successfully updated');
    }

    public function showAdminLogin()
    {
        return view('admin.login');
    }

    public function processAdminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->has('remember_me');
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }
        return redirect()->back()->with('error', 'Invalid email or password')->onlyInput('email');
    }

    public function showAdminDashboard()
    {
        return view('admin.home');
    }

    public function showAdminProfile(Request $request)
    {
        $userId = Auth::guard('admin')->id();
        $user = Admin::find($userId);
        return view('admin.profile', ['user' => $user]);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login')->with('success', 'You have successfully logout');
    }

    public function updateAdminProfile(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|alpha'
        ]);
        $userId = Auth::guard('admin')->id();
        $user = Admin::find($userId);

        $user->name = $request->name;

        $user->save();
        return redirect('/admin/profile')->with('success', 'Your details was successfully updated');
    }

    public function updateAdminPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'bail|required|current_password:admin',
            'password' => 'bail|required|min:6',
            'confirm_password' => 'bail|required|same:password',
        ]);

        $userId = Auth::guard('admin')->id();
        $user = Admin::find($userId);

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/admin/profile')->with('success', 'Your password was successfully updated');
    }
}
