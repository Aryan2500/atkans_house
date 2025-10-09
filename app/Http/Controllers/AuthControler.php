<?php

namespace App\Http\Controllers;

use App\Models\LoginLogs;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;

class AuthControler extends Controller
{
    //

    function index()
    {
        return view('public.login');
    }

    function userlogin(Request $request)
    {

        $redirectUrl = $request->input('redirect');
        // dd($redirectUrl);
        return view('user.auth.login', compact('redirectUrl'));
    }

    function login(Request $request)
    {
        $data = $request->all();
        $redirectUrl = $request->redirect;

        // dd($data);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            // dd(auth()->user()->rols);
            $permissions = auth()->user()->rols ? auth()->user()->rols->permissions : [];

            session(['permissions' => $permissions]);

            $agent = new Agent();
            $agent->setUserAgent($request->userAgent());
            // dd($agent);
            LoginLogs::create([
                'user_id'    => auth()->user()->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'device'     => $agent->device(),
                'os'         => $agent->platform(),
                'browser'    => $agent->browser(),
                'login_at'   => now(),
            ]);

            // dd($redirectUrl);
            if ($redirectUrl) {
                return redirect($redirectUrl);
            }

            if (auth()->user()->role == 'user') {

                return redirect()->route('user.events');
            }
            if (auth()->user()->role == 'admin') {

                return redirect()->route('admin.dashboard');
            }
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
        $role = auth()->user()->role;

        Auth::logout();
        session()->flush();
        if ($role == 'admin') {
            return redirect()->route("login.page");
        } else {
            return redirect()->route("user.login");
        }
    }

    public function edit()
    {
        return view('adminV2.adminprofile.edit');
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


    public function register()
    {
        return view('user.auth.register');
    }


    public function doRegistration(Request $request)
    {
        $data = $request->all();
        $data['consent'] = $request->has('consent') ? true : false;
        // dd($data['consent']);/

        $validator = Validator::make($data, [
            'firstName' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'contact' => 'required|string',
            'dob' => 'required|string',
            'gender' => 'required|in:Male,Female,Other',
            'location' => 'required|string|max:255',
            'consent' => 'nullable|boolean',
            'otp' => 'required|digits:6',
            'password' => 'required|string|min:6|confirmed',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->contact)->orWhere('phone', $request->contact)->first();
        if ($user) {
            return response()->json(['status' => false, 'message' => 'User with this contact already exists'], 400);
        }
        // dd($user);


        $contact = $request->contact;

        // Verify OTP
        $otpRecord = Otp::where('contact', $contact)
            ->where('otp', $request->otp)
            ->where('expires_at', '>=', now())
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$otpRecord) {
            return response()->json(['status' => false, 'message' => 'Invalid or expired OTP'], 400);
        }

        // Create user
        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => filter_var($contact, FILTER_VALIDATE_EMAIL) ? $contact : null,
            'phone' => preg_match('/^[0-9]{10}$/', $contact) ? $contact : null,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'location' => $request->location,
            'consent' => $data['consent'],
            'password' => Hash::make($request->password),
            'email_verified_at' => filter_var($contact, FILTER_VALIDATE_EMAIL) ? now() : null,
            'phone_verified_at' => preg_match('/^[0-9]{10}$/', $contact) ? now() : null,
            'role' => 'user'
        ]);

        // Delete OTP after successful registration
        $otpRecord->delete();


        return response()->json(['status' => true, 'message' => 'Registration completed successfully', 'user' => $user]);
    }
}
