<?php

// استيراد المتحكمات اللازمة
use App\Http\Controllers\API\EmailTemplateController;
use App\Http\Controllers\InstallDemoDataController;
use App\Http\Controllers\Setup\EnvironmentController;
use Illuminate\Support\Facades\Route;

// مسار لتنفيذ مهمة Cronjob
Route::get('/corn-job', [EmailTemplateController::class, 'callCornJob']);

// مسار لتثبيت البيانات التجريبية
Route::any('install-demo-data', [InstallDemoDataController::class, 'run'])
    ->name('install-demo-data');

// مجموعة المسارات الخاصة بالإعدادات
Route::group(['prefix' => 'app'], function () {
    // عرض إعدادات البيئة
    Route::get('environment', [EnvironmentController::class, 'index'])
        ->name('app.environment');

    // حفظ إعدادات قاعدة البيانات
    Route::post('environment/database', [EnvironmentController::class, 'saveEnvironment'])
        ->name('app.environment.database');

    // عرض إعدادات المدير
    Route::get('environment/admin', [EnvironmentController::class, 'admin'])
        ->name('app.environment.admin');

    // تثبيت الإعدادات
    Route::post('environment/install', [EnvironmentController::class, 'store'])
        ->name('app.installer');
});
