<?php

use App\Http\Controllers\View\NavigationController;
use Illuminate\Support\Facades\Route;

// مسار لعرض لوحة التحكم
Route::get('/dashboard', [NavigationController::class, 'dashboardView'])->name('dashboard');

// مسارات لعرض مختلف الصفحات
Route::get('profile-view', [NavigationController::class, 'profileView']); // عرض الملف الشخصي
Route::get('/settings', [NavigationController::class, 'settingsView']); // إعدادات
Route::get('/invite', [NavigationController::class, 'inviteView']); // دعوة
Route::get('/products', [NavigationController::class, 'productView']); // عرض المنتجات
Route::get('/details/{id}', [NavigationController::class, 'productDetailsView']); // تفاصيل المنتج
Route::get('/contacts', [NavigationController::class, 'contactView']); // عرض جهات الاتصال
Route::get('/customers', [NavigationController::class, 'customerView']); // عرض العملاء
Route::get('/suppliers', [NavigationController::class, 'supplierView']); // عرض الموردين
Route::get('/customer/{id}', [NavigationController::class, 'customerDetailsView']); // تفاصيل العميل

// مسارات التقارير
Route::get('reports', [NavigationController::class, 'reportView']); // عرض التقارير
Route::get('reports/sales/{id}', [NavigationController::class, 'salesReportsDetailsView']); // تفاصيل تقارير المبيعات
Route::get('reports/receiving/{id}', [NavigationController::class, 'purchaseReportsDetailsView']); // تفاصيل تقارير الشراء

// عرض تفاصيل المنتج مرة أخرى (قد يكون هناك تكرار هنا)
Route::get('/products/details/{id}', [NavigationController::class, 'productDetailsView']); // تفاصيل المنتج
