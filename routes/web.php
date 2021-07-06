<?php

use App\Helper\RouteHelper;
use App\Http\Controllers\LaporanController;
use Barryvdh\DomPDF\PDF;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);
// Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::get('/staff', function () {
  return view('pages.staff');
});

Route::get('/apart', function () {
  return view('internet.apartemen');
});
Route::get('/bisnis', function () {
  return view('internet.bisnis');
});
Route::get('/tv-cable', function () {
  return view('internet.tv');
});
Route::get('/super-internet', function () {
  return view('internet.super');
});

Route::get('/contact', function () {
  return view('contact.contact');
});

