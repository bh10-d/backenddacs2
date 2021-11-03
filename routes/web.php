<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::resource('/', 'HomepageController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail-product/{product_id}', 'ProductController@details_product');


Route::get('/cart', 'AjaxController@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'AjaxController@addToCart')->name('add.to.cart');
// Route::get('/add-to-cart/{id}',[
//     'uses'=>'AjaxController@addToCart',
//     'as'=>'/add-to-cart/{id}'
// ]);
Route::patch('/update-cart', [AjaxController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [AjaxController::class, 'remove'])->name('remove.from.cart');


Route::post('/add-cart-ajax', 'AjaxController@add_cart_ajax');
Route::post('/update-cart-ajax', 'AjaxController@update_cart_ajax')->name('update.cart.ajax');
Route::get('/show-cart-ajax', 'AjaxController@show_cart_ajax')->name('show.cart.ajax');

// Route::get('/show-cart-ajax','AjaxController@show_cart_ajax');