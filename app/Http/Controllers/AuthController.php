<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Signup form
    public function showSignup()
    {
        return view('signup');
    }

    // Register new user
    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female,Other',
            'age' => 'required|integer|min:1|max:120',
            'address' => 'required|string|max:1000',
            'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload profile picture
        $picturePath = $request->file('picture')
            ->store('profile-pictures', 'public');

        // Map form fields to database columns
        $user = new User();

        $user->name = $data['full_name'];
        $user->father_name = $data['father_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->gender = $data['gender'];
        $user->age = $data['age'];
        $user->address = $data['address'];
        $user->profile_picture = $picturePath;

        $user->save();

        return redirect()->route('success');
    }

    // Login form
     public function showLogin()
{
    return view('registration-login');
}

    // Verify login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (
            $user &&
            Hash::check($credentials['password'], $user->password)
        ) {
            $request->session()->regenerate();

            $request->session()->put('registration_id', $user->id);

            return redirect()->route('dashboard');
        }

        return redirect()
            ->route('invalid.login')
            ->with('error', 'Invalid email or password.');
    }

    
     // Invalid login page
public function invalidLogin()
{
    return view('invalid_login');
}

    // Signup success page
    public function success()
    {
        return view('success');
    }

    // Dashboard
    public function dashboard(Request $request)
    {
        $user = User::find(
            $request->session()->get('registration_id')
        );

        if (!$user) {
            return redirect()->route('registration.login');
        }

        return view('dashboard', compact('user'));
    }

    // Profile
    public function profile(Request $request)
    {
        $user = User::find(
            $request->session()->get('registration_id')
        );

        if (!$user) {
            return redirect()->route('registration.login');
        }

        return view('profile', compact('user'));
    }


    // Show Edit Profile form
    public function editProfile(Request $request)
    {
        $user = User::find(
            $request->session()->get('registration_id')
        );

        if (!$user) {
            return redirect()->route('registration.login');
        }

        return view('edit-profile', compact('user'));
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        $user = User::find(
            $request->session()->get('registration_id')
        );

        if (!$user) {
            return redirect()->route('registration.login');
        }

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female,Other',
            'age' => 'required|integer|min:1|max:120',
            'address' => 'required|string|max:1000',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->name = $data['full_name'];
        $user->father_name = $data['father_name'];
        $user->phone = $data['phone'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->gender = $data['gender'];
        $user->age = $data['age'];
        $user->address = $data['address'];

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')
                ->store('profile-pictures', 'public');

            $user->profile_picture = $picturePath;
        }

        $user->save();

        return redirect()
            ->route('profile')
            ->with('success', 'Profile updated successfully!');
    }

    // Show Forgot Password form
    public function showForgotPassword()
    {
        return view('forgot-password');
    }

    // Send password reset link
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors([
            'email' => __($status),
        ]);
    }

    // Show Reset Password form
    public function showResetPassword(Request $request, string $token)
    {
        return view('reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    // Update password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user, string $password) {
                $user->password = $password;
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('registration.login')
                ->with('status', 'Password reset successfully. Please login.');
        }

        return back()->withErrors([
            'email' => [__($status)],
        ]);
    }


    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget('registration_id');
        $request->session()->regenerateToken();

        return redirect()->route('registration.login');
    }
}
