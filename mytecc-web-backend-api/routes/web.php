<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    // Authentication Routes...
    Route::get('login', [LoginController::class ,'showLoginForm'])->name('login');
    Route::post('login/submit', [LoginController::class ,'login'])->name('login.submit');
    Route::post('logout', [LoginController::class ,'logout'])->name('logout');

    // // Registration Routes...
    // Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('register', [RegisterController::class, 'register']);

    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class ,'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class ,'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // // Confirm Password (added in v6.2)
    // Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    // Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

    // // Email Verification Routes...
    // Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    // Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    // Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    //Admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('profile/{id}', [AdminAccountController::class, 'show'])->name('account.show');
Route::put('profile/{id}/update-account', [AdminAccountController::class, 'updateAccount'])->name('account.updateAccount');
Route::put('profile/{id}/update-password', [AdminAccountController::class, 'updatePassword'])->name('account.updatePassword');
