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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('homepage');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::get('categories-product', 'HomeController@categoriesProductsIndex');

Route::get('/admin', 'HomeController@management');

/** Categorie */

Route::get('categories/add', 'CategoriesController@add');
Route::post('categories/add', 'CategoriesController@create');

Route::get('categories/update', 'CategoriesController@edit');
Route::post('categories/update', 'CategoriesController@update');

Route::get('categories/delete', 'CategoriesController@remove');
Route::post('categories/delete', 'CategoriesController@delete');

Route::get('categories/index', 'CategoriesController@index');
Route::get('categories/{id}/{title}', 'CategoriesController@category');

/** Prodotti */

Route::get('products/add', 'ProductsController@add');
Route::post('products/add', 'ProductsController@create');

Route::get('products/update', 'ProductsController@edit');
Route::post('products/update', 'ProductsController@update');

Route::get('products/delete', 'ProductsController@remove');
Route::post('products/delete', 'ProductsController@delete');

Route::get('products/{id}/{name}', 'ProductsController@product');
//

Route::get('/homepage', function() {
    return view('homepage');
});