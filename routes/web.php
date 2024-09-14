<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [HomeController::class, 'index']);

// Route::get('/home', 'HomeController@index');

// //roles table 
// Route::resource('/role', 'RolesController@index');
// Route::resource('/role/create', 'RolesController@create');
// //roles 
// Route::resource('/role', 'RoleController');

// //User 
// Route::resource('/user', 'UserController');

// //Supplier 
// Route::resource('/supplier', 'SupplierController');
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::get('{id}', [SupplierController::class, 'show']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::put('{id}', [SupplierController::class, 'update']);
    Route::delete('{id}', [SupplierController::class, 'destroy']);
});
// //Customer
// Route::resource('/customer', 'CustomerController');

// //Unit
// Route::resource('/unit', 'UnitController');

// //brand
// Route::resource('/brand', 'BrandController');
 
// //category
// Route::resource('/category', 'CategoryController');

// //Product
Route::resource('product', ProductController::class);

// //Purchase
// Route::resource('/purchase', 'PurchaseController');
// //Sale
// Route::resource('/sale', 'SaleController');

// //Expense
// Route::resource('/expense', 'ExpenseController');

// //Stock
// Route::get('/stock','StockController@index');

// //Report
// Route::get('/report','ReportController@index');


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('create', [UserController::class, 'create']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);
});