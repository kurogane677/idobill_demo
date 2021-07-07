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
  return view('welcome.pages.staff');
});
Route::get('/gallery', function () {
  return view('welcome.pages.gallery');
});

Route::get('/apart', function () {
  return view('welcome.internet.apartemen');
});
Route::get('/bisnis', function () {
  return view('welcome.internet.bisnis');
});
Route::get('/tv-cable', function () {
  return view('welcome.internet.tv');
});
Route::get('/super-internet', function () {
  return view('welcome.internet.super');
});

Route::get('/contact', function () {
  return view('welcome.pages.contact');
});

