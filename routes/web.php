<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'NewShopController@index')->name('home');
Route::get('/category-product', 'NewShopController@categoryContent')->name('category-product');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

/* Category Info */
Route::get('/category/add', 'CategoryController@createCategory');

Route::post('/category/save', 'CategoryController@storeCategory');

Route::get('/category/manage', 'CategoryController@manageCategory');

Route::get('/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/category/update', 'CategoryController@updateCategory');

Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');

/* Manufacturer Info */
Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');

Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');

Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer');
Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');

Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer');

/* Product Info */
Route::get('/product/add', 'ProductController@createProduct');
Route::post('/product/save', 'ProductController@storeProduct');

Route::get('/product/manage', 'ProductController@manageProduct');

Route::get('/product/edit/{id}', 'ProductController@editProduct');
Route::post('/product/update', 'ProductController@updateProduct');

Route::get('/product/delete/{id}', 'ProductController@deleteProduct');





