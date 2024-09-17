<?php

use App\Http\Controllers\API\RegisterLogController;
use App\Http\Controllers\API\ReportController;
use Illuminate\Support\Facades\Route;

// تقارير المشتريات للعملاء
Route::post('customer-purchase-report/{id}', [ReportController::class, 'customerPurchaseReport']);
Route::get('reports/ordersDetails/{id}', [ReportController::class, 'getOrdersDetails']);
Route::get('/ordersDetails', [ReportController::class, 'getOrdersDetails']);
Route::get('reports/order-details-and-invoice-template/{id}', [ReportController::class, 'getOrderDetailsWithInvoiceTemplate']);

// تقارير المبيعات
Route::post('sales-report', [ReportController::class, 'salesReport']);
Route::post('all-sales-details', [ReportController::class, 'allSalesDetails']);
Route::post('sales-summary-report', [ReportController::class, 'salesSummaryReport']);
Route::post('reports/salesDetails/{id}', [ReportController::class, 'getSalesDetails']);
Route::get('/sales-report-filter', [ReportController::class, 'getSalesReportFilterData']);
Route::get('/sales-details-filter', [ReportController::class, 'getSalesDetailsFilterData']);
Route::get('/sales-due-filter', [ReportController::class, 'getCustomerDueFilterData']);
Route::post('/sales-and-purchase-report', [ReportController::class, 'salesAndPurchaseReport']);
Route::get('/purchase-report-filter', [ReportController::class, 'purchaseReportFilter']);

// تقارير تعديل المخزون
Route::get('/adjustment-report-filter', [ReportController::class, 'getAdjustmentReportFilterData']);
Route::post('adjust-stock-report', [ReportController::class, 'adjustStockReport']);
Route::post('shipment-report', [ReportController::class, 'shipmentReport']);

// تقارير العملاء
Route::post('customer-summary-report', [ReportController::class, 'customerSummaryReport']);
Route::get('/customer-report-filter', [ReportController::class, 'getCustomerReportFilterData']);

// تقارير الموردين
Route::post('supplier-summary-report', [ReportController::class, 'supplierSummaryReport']);

// تقارير الاستلام
Route::post('receiving-summary-report', [ReportController::class, 'receivingSummary']);
Route::post('purchase-report', [ReportController::class, 'purchaseReport']);

// تقارير سجلات التسجيل
Route::post('register-log-reports', [ReportController::class, 'registerLogReports']);
Route::get('cash-register-for-filter', [ReportController::class, 'getCashRegisterFilterData']);

// تقارير المخزون
Route::post('inventory-reports', [ReportController::class, 'inventoryReports']);
Route::get('inventory-reports-filter', [ReportController::class, 'inventoryReportsFilter']);

// تقارير الدفع
Route::post('payment-reports', [ReportController::class, 'paymentReport']);
Route::get('payment-reports-filter', [ReportController::class, 'paymentReportFilter']);
Route::get('payment-summery-reports-filter', [ReportController::class, 'paymentSummaryReportFilter']);
Route::post('payment-summary-reports', [ReportController::class, 'paymentSummary']);

// مخططات المبيعات
Route::post('yearly-sales-chart', [ReportController::class, 'yearlySalesChart']);
Route::get('branch-user', [ReportController::class, 'getBranchAndUser']);
Route::get('available-stock-chart', [ReportController::class, 'availableStockChart']);

// تقارير الاستلام
Route::post('receiving-summary-reports', [ReportController::class, 'receivingSummary']);

// سجلات النقدية
Route::get('cash-register-logs', [RegisterLogController::class, 'index']);
Route::post('save-cash-register', [RegisterLogController::class, 'saveRegisterLog']);

// تقارير الضرائب
Route::post('tax-report', [ReportController::class, 'taxReports']);

// تقارير الأرباح والخسائر
Route::post('profit-loss-report', [ReportController::class, 'profitLossReport']);
