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

/** Ale */
//TODO:: FARE IN MODO DI SPOSTARE I PRODOTTI NELLA CATEGORIA VARIE DOPO CHE E' STATA ELIMINATA UNA CATEGORIA
//TODO:: FARE IN MODO CHE I GUEST POSSANO ACCEDERE ALLE CATEGORIE, MA CHE NON POSSANO METTERE NEL CARRELLO I PRODOTTI
//TODO:: CREARE UN SEEDER PER LE CATEGORIE: TECNOLOGIA, ABBIGLIAMENTO, SPORT
//TODO:: FARE IL CHECKOUT

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

Route::get('categories/read', 'CategoriesController@read');

Route::get('categories/delete', 'CategoriesController@remove');
Route::post('categories/delete', 'CategoriesController@delete');

Route::get('categories/index', 'CategoriesController@index');
Route::get('categories/{id}/{title}', 'CategoriesController@category');

/** Prodotti */

Route::get('products/add', 'ProductsController@add');
Route::post('products/add', 'ProductsController@create');

Route::get('products/update', 'ProductsController@edit');
Route::post('products/update', 'ProductsController@update');

Route::get('products/read', 'ProductsController@read');

Route::get('products/delete', 'ProductsController@remove');
Route::post('products/delete', 'ProductsController@delete');

Route::get('products/{id}/{name}', 'ProductsController@product');

/** Carrello */

Route::post('cart/add', 'CartController@store');
Route::post('cart/update', 'CartController@update');
Route::get('cart/index', 'CartController@index');

Route::get('/homepage', function() {
    return view('homepage');
});