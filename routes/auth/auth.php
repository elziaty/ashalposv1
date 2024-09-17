<?php

use App\Http\Controllers\API\InviteController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;

// عرض نموذج تسجيل الدخول
Route::get('/', [LoginController::class, 'showLoginForm'])
    ->name('login');

// مسار تسجيل الدخول
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/', [LoginController::class, 'login']);

// مسارات استعادة كلمة المرور
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
Route::post('/password/reset/{token}', [ResetPasswordController::class, 'reset']);

// مسار التحقق من المستخدم
Route::get('/verify/{token}', [RegisterController::class, 'verifyUser']);

// مسارات قبول الدعوة
Route::get('accept/{token}', [InviteController::class, 'accept']);
Route::get('register/{token}', [RegisterController::class, 'regForm']);
Route::post('register/{token}', [InviteController::class, 'invitedRegistration']);

// استعادة كلمة المرور
Route::post('/recover', [AuthController::class, 'recover']);
