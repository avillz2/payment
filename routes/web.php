<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/download', function(){
//     $file = public_path()."/inputgroup.pdf";

//     $headers =array(
//         'content-type:application/pdf',
//     );

//     return response()->download($file, "inputgroup.pdf", $headers);
// });

Route::post('/download', 'App\Http\Controllers\ProductController@download');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('permission', 'App\Http\Controllers\PermissionController');
Route::resource('product', 'App\Http\Controllers\ProductController');
Route::resource('products', 'App\Http\Controllers\ProductsController');
Route::resource('role', 'App\Http\Controllers\RoleController');


Route::get('profile', 'App\Http\Controllers\UserController@profile')->name('profile');

Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');

Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');

Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');

Route::Post('/pay', 'App\Http\Controllers\PaymentController@redirectToGateway')->name('pay');

Route::get('/payment/callback', 'App\Http\Controllers\PaymentController@handleGatewayCallback');
