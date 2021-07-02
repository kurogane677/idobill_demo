<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('products', 'App\Http\Controllers\Api\ProductController@index');

// Validation API routes
Route::get('email', 'App\Http\Controllers\Api\ValidationController@email');
Route::get('phone', 'App\Http\Controllers\Api\ValidationController@phone');
Route::get('identity', 'App\Http\Controllers\Api\ValidationController@identity');

Route::get('jlhCustomers', 'App\Http\Controllers\Api\DashboardController@jlhCustomers');

Route::get('unpaidInvoice', 'App\Http\Controllers\Api\UnpaidInvoiceController@index');
