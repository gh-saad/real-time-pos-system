<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TransactionItemController;
use App\Http\Controllers\Api\InventoryAdjustmentController;
use App\Http\Controllers\Api\PurchaseOrderController;
use App\Http\Controllers\Api\StoreSettingController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)->names([
    'index' => 'api.users.index',
    'store' => 'api.users.store',
    'show' => 'api.users.show',
    'update' => 'api.users.update',
    'destroy' => 'api.users.destroy',
]);

// store Routes
Route::prefix('stores')->group(function () {
    Route::get('/', [StoreController::class, 'index']);
    Route::get('{id}', [StoreController::class, 'show']);
    Route::post('/', [StoreController::class, 'store']);
    Route::put('{id}', [StoreController::class, 'update']);
    Route::delete('{id}', [StoreController::class, 'destroy']);
});

// Product Routes
// Route::prefix('products')->group(function () {
//     Route::get('/', [ProductController::class, 'index']);
//     Route::get('{id}', [ProductController::class, 'show']);
//     Route::post('/', [ProductController::class, 'store']);
//     Route::put('{id}', [ProductController::class, 'update']);
//     Route::delete('{id}', [ProductController::class, 'destroy']);
// });
Route::apiResource('products', ProductController::class)->names([
    'index' => 'api.products.index',
    'store' => 'api.products.store',
    'show' => 'api.products.show',
    'update' => 'api.products.update',
    'destroy' => 'api.products.destroy',
]);

// Category Routes
// Route::prefix('product/categories')->group(function () {
//     Route::get('/', [CategoryController::class, 'index']);
//     Route::get('{id}', [CategoryController::class, 'show']);
//     Route::post('/', [CategoryController::class, 'store']);
//     Route::put('{id}', [CategoryController::class, 'update']);
//     Route::delete('{id}', [CategoryController::class, 'destroy']);
// });
Route::apiResource('product/categories', CategoryController::class)->names([
    'index' => 'api.categories.index',
    'store' => 'api.categories.store',
    'show' => 'api.categories.show',
    'update' => 'api.categories.update',
    'destroy' => 'api.categories.destroy',
]);

// Supplier Routes
// Route::prefix('suppliers')->group(function () {
//     Route::get('/', [SupplierController::class, 'index']);
//     Route::get('{id}', [SupplierController::class, 'show']);
//     Route::post('/', [SupplierController::class, 'store']);
//     Route::put('{id}', [SupplierController::class, 'update']);
//     Route::delete('{id}', [SupplierController::class, 'destroy']);
// });
Route::apiResource('suppliers', SupplierController::class)->names([
    'index' => 'api.suppliers.index',
    'store' => 'api.suppliers.store',
    'show' => 'api.suppliers.show',
    'update' => 'api.suppliers.update',
    'destroy' => 'api.suppliers.destroy',
]);

// Customer Routes
Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('{id}', [CustomerController::class, 'show']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::put('{id}', [CustomerController::class, 'update']);
    Route::delete('{id}', [CustomerController::class, 'destroy']);
});

// Purchase Order Routes
Route::apiResource('purchase-orders', PurchaseOrderController::class)->names([
    'index' => 'api.purchase.orders.index',
    'store' => 'api.purchase.orders.store',
    'show' => 'api.purchase.orders.show',
    'update' => 'api.purchase.orders.update',
    'destroy' => 'api.purchase.orders.destroy',
]);
// Transaction Routes
Route::prefix('transactions')->group(function () {
    Route::get('/', [TransactionController::class, 'index']);
    Route::get('{id}', [TransactionController::class, 'show']);
    Route::post('/', [TransactionController::class, 'store']);
    Route::put('{id}', [TransactionController::class, 'update']);
    Route::delete('{id}', [TransactionController::class, 'destroy']);
});

// TransactionItem Routes
Route::prefix('transaction-items')->group(function () {
    Route::get('/', [TransactionItemController::class, 'index']);
    Route::get('{id}', [TransactionItemController::class, 'show']);
    Route::post('/', [TransactionItemController::class, 'store']);
    Route::put('{id}', [TransactionItemController::class, 'update']);
    Route::delete('{id}', [TransactionItemController::class, 'destroy']);
});

// InventoryAdjustment Routes
Route::prefix('inventory-adjustments')->group(function () {
    Route::get('/', [InventoryAdjustmentController::class, 'index']);
    Route::get('{id}', [InventoryAdjustmentController::class, 'show']);
    Route::post('/', [InventoryAdjustmentController::class, 'store']);
    Route::put('{id}', [InventoryAdjustmentController::class, 'update']);
    Route::delete('{id}', [InventoryAdjustmentController::class, 'destroy']);
});

// StoreSetting Routes
Route::prefix('store-settings')->group(function () {
    Route::get('/', [StoreSettingController::class, 'index']);
    Route::get('{id}', [StoreSettingController::class, 'show']);
    Route::post('/', [StoreSettingController::class, 'store']);
    Route::put('{id}', [StoreSettingController::class, 'update']);
    Route::delete('{id}', [StoreSettingController::class, 'destroy']);
});