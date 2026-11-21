<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('registration.login');
});
// Signup
Route::get('/signup', [AuthController::class, 'showSignup'])
    ->name('signup');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

// Login // New Registration Project Login
Route::get('/registration-login', [AuthController::class, 'showLogin'])
    ->name('registration.login');

Route::post('/registration-login', [AuthController::class, 'login'])
    ->name('login.submit');
// Invalid login
Route::get('/invalid-login', [AuthController::class, 'invalidLogin'])
    ->name('invalid.login');

// Registration success
Route::get('/success', [AuthController::class, 'success'])
    ->name('success');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->name('dashboard');

// Profile
Route::get('/profile', [AuthController::class, 'profile'])
    ->name('profile');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
    // Profile
Route::get('/profile', [AuthController::class, 'profile'])
    ->name('profile');

// Edit Profile
Route::get('/profile/edit', [AuthController::class, 'editProfile'])
    ->name('profile.edit');

Route::put('/profile/update', [AuthController::class, 'updateProfile'])
    ->name('profile.update');
    
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
