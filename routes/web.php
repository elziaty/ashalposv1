<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// مجموعة المسارات الإضافية
Route::group([], function () {
    require_once(__DIR__ . '/additional/additional.php');
    require_once(__DIR__ . '/language/language.php');
    require_once(__DIR__ . '/auth/auth.php');
});

// مجموعة المسارات المحمية بالميدل وير
Route::group(['middleware' => ['auth']], function () {
    require_once(__DIR__ . '/dashboard/dashboard.php');
    require_once(__DIR__ . '/navigation/navigation.php');
    require_once(__DIR__ . '/contact/contact.php');
    require_once(__DIR__ . '/product/product.php');
    require_once(__DIR__ . '/sales_purchase/sales_purchase.php');
    require_once(__DIR__ . '/report/reportRoutes.php');
    require_once(__DIR__ . '/report/exportAllReport.php');
    require_once(__DIR__ . '/setting/setting.php');
    require_once(__DIR__ . '/todo/todo.php');

    // تسجيل الخروج
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // مسح ذاكرة التخزين المؤقت للغات
    Route::get('/clear-language-cache', function () {
        Artisan::call('cache:clear');
        return 'تم مسح ذاكرة التخزين المؤقت للغات!';
    });
});

// إنشاء رابط التخزين
Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return 'تم إنشاء رابط التخزين!';
});
