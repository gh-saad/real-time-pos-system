<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//roles 
Route::resource('/role', 'RoleController');

//User 
Route::resource('/user', 'UserController');

//Supplier 
Route::resource('/supplier', 'SupplierController');

//Customer
Route::resource('/customer', 'CustomerController');

//Unit
Route::resource('/unit', 'UnitController');

//brand
Route::resource('/brand', 'BrandController');
 
//category
Route::resource('/category', 'CategoryController');

//Product
Route::resource('/product', 'ProductController');

//Purchase
Route::resource('/purchase', 'PurchaseController');
//Sale
Route::resource('/sale', 'SaleController');

//Expense
Route::resource('/expense', 'ExpenseController');

//Stock
Route::get('/stock','StockController@index');

//Report
Route::get('/report','ReportController@index');

