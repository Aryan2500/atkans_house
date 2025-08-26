<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthControler extends Controller
{
    //

    function index()
    {
        return view('public.login');
    }

    function login(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $permissions = auth()->user()->rols->permissions;

            session(['permissions' => $permissions]);

            return redirect()->route('admin.dashboard');
        } else {
            // Authentication failed
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->withInput();
        }


        return $data;
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route("login.page");
    }

    public function edit()
    {
        return view('admin.adminprofile.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update($request->only('name', 'email', 'phone'));

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    ///////////////// Password Reset /////////////////////////

    public function showForgotPasswordForm()
    {
        return view('public.forget-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Password reset link sent!')
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('public.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.dashboard')->with('success', 'Password reset successfully!')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
