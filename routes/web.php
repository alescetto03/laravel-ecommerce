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

//TODO::FARE IN MODO DI FAR USCIRE IL MESSAGGIO QUANDO SI AGGIUNGE UN NUOVO ORDINE NELLA CRONOLOGIA

/** Jose*/
/*
 *  TODO::Capire come create una crud fatta bene
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('homepage');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::get('/admin', 'HomeController@management');

/** Categorie */

Route::get('categories/add', 'CategoriesController@add');
Route::post('categories/add', 'CategoriesController@create');

Route::get('categories/update', 'CategoriesController@edit');
Route::post('categories/update', 'CategoriesController@update');

Route::get('categories/read', 'CategoriesController@read');

Route::get('categories/delete', 'CategoriesController@remove');
Route::post('categories/delete', 'CategoriesController@delete');

Route::get('categories/index', 'GuestController@productIndex');
Route::get('categories/{id}/{title}', 'GuestController@category');

/** Prodotti */

Route::get('products/add', 'ProductsController@add');
Route::post('products/add', 'ProductsController@create');

Route::get('products/update', 'ProductsController@edit');
Route::post('products/update', 'ProductsController@update');

Route::get('products/read', 'ProductsController@read');

Route::get('products/delete', 'ProductsController@remove');
Route::post('products/delete', 'ProductsController@delete');

Route::get('products/{id}/{name}', 'GuestController@product');

/** Ordini */
Route::get('order/add', 'OrdersController@add');
Route::post('order/add', 'OrdersController@create');

Route::get('order/read', 'OrdersController@read');

Route::get('order/update', 'OrdersController@edit');
Route::post('order/update', 'OrdersController@update');

Route::get('order/delete', 'OrdersController@remove');
Route::post('order/delete', 'OrdersController@delete');

/** Carrello */

Route::post('cart/add', 'CartController@store');

Route::get('cart/index', 'CartController@index');

Route::post('cart/update', 'CartController@update');

Route::post('cart/delete', 'CartController@delete');

/** Checkout */

Route::get('checkout', 'CheckoutController@index');
Route::post('payment', 'CheckoutController@payment');

/** Chronology */

Route::get('/chronology', 'CheckoutController@chronology');

Route::get('/homepage', function() {
    return view('homepage');
});