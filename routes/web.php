<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



/*
/--------------------------------------------------------------------------
/                                    HOMEPAGE
/--------------------------------------------------------------------------
*/


Route::resource('/', 'HomepageController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail-product/{product_id}', 'ProductController@details_product');


Route::get('/cart', 'AjaxController@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'AjaxController@addToCart')->name('add.to.cart');
// Route::get('/add-to-cart/{id}',[
//     'uses'=>'AjaxController@addToCart',
//     'as'=>'/add-to-cart/{id}'
// ]);
Route::patch('/update-cart', [AjaxController::class, 'update'])->name('update.cart');
Route::get('/remove-from-cart', [AjaxController::class, 'remove'])->name('remove.from.cart');

Route::post('/add-cart-ajax', 'AjaxController@add_cart_ajax');
Route::post('/update-cart-ajax', 'AjaxController@update_cart_ajax')->name('update.cart.ajax');
Route::get('/show-cart-ajax', 'AjaxController@show_cart_ajax')->name('show.cart.ajax');

// Route::get('/show-cart-ajax','AjaxController@show_cart_ajax');
//thanh toán
Route::post('/purchase','AjaxController@purchase');
Route::get('/thanhtoan', 'Pay\PaymentController@index')->name('thanhtoan');
Route::get('/loadpayment','Pay\PaymentController@payment')->name('loadpayment');
Route::get('/success', 'Pay\PaymentController@success')->name('success');

//route search
Route::get('/search', 'AjaxController@search');
Route::post('/search-ajax', 'AjaxController@search_ajax');
Route::post('/show-all', 'AjaxController@show_all_products');
Route::post('/search-block', 'AjaxController@search_dropdown');

//route pdf
// Route::get('/data-bill','AjaxController@contentPDF');
Route::get('/render-bill','AjaxController@createPDF');


//test

/*
/--------------------------------------------------------------------------
/                                 END HOMEPAGE
/--------------------------------------------------------------------------
*/

/*
/--------------------------------------------------------------------------
/                                    LOGIN (by hieu)
/--------------------------------------------------------------------------
*/

// Route::get('login',function (){return view('admin.login');})->name('login');

// Route::get('facebook/{social}','SocialController@redirectToProvider');
// Route::get('check-facebook/{social}','SocialController@check');

Route::get('/auth/redirect/{provider}', 'Auth\SocialController@redirect');
Route::get('/callback/{provider}', 'Auth\SocialController@handle');
/*
/--------------------------------------------------------------------------
/                                  END LOGIN
/--------------------------------------------------------------------------
*/

/*
/--------------------------------------------------------------------------
/                            ADMIN PAGE (by hieu)
/--------------------------------------------------------------------------
*/
// Route::get('admin',function(){ return view('admin.dashboard.dashboard');})->name('admin')->middleware(['auth','role:admin']);
Route::get('admin','AdminDashboardController@index')->name('admin')->middleware(['auth','role:admin']);
//                                    User
Route::get('user', function() { return view('admin.user.user');})->name('user')->middleware(['auth','role:admin']);
Route::get('usershow', 'AdminUserController@index')->name('usershow')->middleware(['auth','role:admin']);

// Route::get('user/fetch_data', 'AdminUserController@fetch_data');

// Route::get('staffshow',[
//     'uses'=>'AdminUserController@afterindex',
//     'as'=>'staffshow'
// ]);
Route::get('staffshow','AdminUserController@afterindex')->name('staffshow')->middleware(['auth','role:admin']);

Route::post('uploadstaff',[
    'uses'=>'AdminUserController@UploadStaff',
    'as'=>'uploadstaff'
]);

//                                    Chart
// Route::get('chart', function() { return view('admin.chart.chart');})->name('chart')->middleware(['auth','role:admin']);
Route::get('chart', 'AdminChartController@index')->name('chart')->middleware('auth','role:admin');
//                                  Product
// Route::get('product', function() { return view('admin.product.product');})->name('product')->middleware(['auth','role:admin']);
Route::get('product', 'AdminProductController@index')->name('product')->middleware(['auth','role:admin']);
Route::get('producttable','AdminProductController@afterindex')->name('producttable')->middleware(['auth','role:admin']);
// Route::get('product/fetch_data', 'AdminProductController@fetch_data');
Route::post('uploadproduct',[
    'uses'=>'AdminProductController@UploadProduct',
    'as'=>'uploadproduct'
]);
// chinh sua lien quan den upload anh
Route::post('imagefile',[
    'uses'=>'AdminProductController@GetImages',
    'as'=>'imagefile'
]);
Route::post('upload','AdminProductController@Upload')->name('ckeditor.upload');
// Route::resource('ckeditor','CkeditorController');
Route::get('test/{id}','AdminProductController@test')->name('test');
Route::get('editproduct/{id}','AdminProductController@edit')->name('editproduct');
Route::get('delete/{id}','AdminProductController@delete')->name('delete');

//                                  Oder
Route::get('order', function() { return view('admin.order.order');})->name('order')->middleware('auth','role:admin');
Route::get('ordershow', 'AdminOrderController@index')->name('ordershow')->middleware('auth','role:admin');
Route::get('changestatus/{id}/{status}','AdminOrderController@status')->name('changestatus')->middleware('auth','role:admin');
Route::get('delete/{id}','AdminOrderController@delete')->name('delete')->middleware('auth','role:admin');
/*
/--------------------------------------------------------------------------
/                                END ADMIN PAGE
/--------------------------------------------------------------------------
*/