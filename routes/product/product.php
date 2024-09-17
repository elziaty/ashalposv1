<?php

use App\Http\Controllers\API\Export\ProductExportController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\ProductAttributesController;
use App\Http\Controllers\API\ProductBrandsController;
use App\Http\Controllers\API\ProductCategoriesController;
use App\Http\Controllers\API\ProductGroupsController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\ProductUnitsController;
use Illuminate\Support\Facades\Route;

// مجموعة من المسارات الخاصة بالمنتجات
Route::group(['prefix' => 'products', 'as' => 'products'], function () {
    // عرض قائمة المنتجات
    Route::get('products', [ProductApiController::class, 'index']);

    // مسارات المنتجات
    Route::post('products', [ProductsController::class, 'getProduct']);
    Route::post('store', [ProductsController::class, 'storeProduct'])
        ->middleware('permissions:can_manage_products');

    Route::post('delete/{id}', [ProductsController::class, 'deleteProduct'])
        ->middleware('permissions:can_manage_products');

    Route::get('all-supporting-data', [ProductsController::class, 'productSupportingData']);
    Route::get('edit-product/{id}', [ProductsController::class, 'getProductEditData']);
    Route::post('edit/{id}', [ProductsController::class, 'editProduct']);
    Route::get('getDetails/{id}', [ProductsController::class, 'getProductDetails']);
    Route::post('variantDetails/{id}', [ProductsController::class, 'getVariantDetails']);
    Route::post('/import', [ProductsController::class, 'importProduct'])
        ->middleware('permissions:can_manage_products');
    Route::post('/import-stock', [ProductsController::class, 'importOpeningStock'])
        ->middleware('permissions:can_manage_products');
    Route::get('/supporting-data', [ProductsController::class, 'getSupportingData']);
    Route::post('/adjust-stock', [ProductsController::class, 'adjustStockData']);
    Route::get('/search-product-for-stock-adjustment', [ProductsController::class, 'searchProductForStockAdjust']);

    // مسارات المتغيرات
    Route::get('variant/{id}', [ProductsController::class, 'showVariant']);

    // مسارات فئات المنتجات
    Route::get('category', [ProductCategoriesController::class, 'index']);
    Route::post('categories', [ProductCategoriesController::class, 'getCategory']);
    Route::post('category/store', [ProductCategoriesController::class, 'storeCategory'])
        ->middleware('permissions:can_manage_categories');
    Route::post('category/delete/{id}', [ProductCategoriesController::class, 'deleteCategory'])
        ->middleware('permissions:can_manage_categories');
    Route::get('category/{id}', [ProductCategoriesController::class, 'showCategory']);
    Route::post('category/{id}', [ProductCategoriesController::class, 'updateCategory'])
        ->middleware('permissions:can_manage_categories');

    // مسارات علامات المنتجات
    Route::get('brand', [ProductBrandsController::class, 'index']);
    Route::post('brands', [ProductBrandsController::class, 'getBrand']);
    Route::post('brand/store', [ProductBrandsController::class, 'storeBrand'])
        ->middleware('permissions:can_manage_brands');
    Route::post('brand/delete/{id}', [ProductBrandsController::class, 'deleteBrand']);
    Route::get('brand/{id}', [ProductBrandsController::class, 'showBrand']);
    Route::post('brand/{id}', [ProductBrandsController::class, 'updateBrand'])
        ->middleware('permissions:can_manage_brands');

    // مسارات مجموعات المنتجات
    Route::get('group', [ProductGroupsController::class, 'getGroup']);
    Route::post('groups', [ProductGroupsController::class, 'getAllGroup']);
    Route::post('group/store', [ProductGroupsController::class, 'storeGroup'])
        ->middleware('permissions:can_manage_groups');
    Route::post('group/delete/{id}', [ProductGroupsController::class, 'deleteGroup'])
        ->middleware('permissions:can_manage_groups');
    Route::get('group/{id}', [ProductGroupsController::class, 'showGroup']);
    Route::post('group/{id}', [ProductGroupsController::class, 'updateGroup'])
        ->middleware('permissions:can_manage_groups');
    Route::delete('group/delete/{id}', [ProductGroupsController::class, 'deleteGroup'])
        ->middleware('permissions:can_manage_groups');

    // مسارات خصائص المنتجات
    Route::get('attribute', [ProductAttributesController::class, 'getAttribute']);
    Route::post('variant-attributes', [ProductAttributesController::class, 'getAttributeList']);
    Route::get('product-variant-attribute', [ProductAttributesController::class, 'getProductAttributeList']);
    Route::post('attribute/store', [ProductAttributesController::class, 'storeAttribute'])
        ->middleware('permissions:can_manage_variant_attribute');
    Route::post('attribute/delete/{id}', [ProductAttributesController::class, 'deleteAttribute'])
        ->middleware('permissions:can_manage_variant_attribute');
    Route::get('attribute/{id}', [ProductAttributesController::class, 'showAttribute']);
    Route::post('attribute/{id}', [ProductAttributesController::class, 'updateAttribute'])
        ->middleware('permissions:can_manage_variant_attribute');

    // مسارات وحدات المنتجات
    Route::post('unit/store', [ProductUnitsController::class, 'store']);
    Route::post('units', [ProductUnitsController::class, 'getUnit']);
    Route::post('unit/{id}', [ProductUnitsController::class, 'update']);
    Route::get('unit/{id}', [ProductUnitsController::class, 'show']);
    Route::post('unit/delete/{id}', [ProductUnitsController::class, 'delete']);
    
    // مسار تصدير جميع المنتجات
    Route::get('export/all', [ProductExportController::class, 'exportAllProduct']);
});
