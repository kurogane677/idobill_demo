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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['verified', 'nocache'])->group(function () {

  // Semua UserManagementController
  $dir = 'App\Http\Controllers\\';

  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

  Route::get('/NoAuthorize', [App\Http\Controllers\BlockingController::class, 'index'])
    ->name('no_authorize');



  // Route::get('/dashboard', $dir . 'DashboardController');
  Route::resource('customer', $dir . 'CustomerController');


  // Route::resource('pembayaran', $dir . 'PembayaranInvoiceController');
  // Route::resource('print_invoice', $dir . 'PrintInvoiceController');
  Route::resource('kwitansi_pembayaran', $dir . 'KwitansiPembayaranController');

  Route::resource('parallel', $dir . 'ParallelController');
  Route::resource('product', $dir . 'ProductController');
  Route::resource('area', $dir . 'AreaController');
  Route::resource('wilayah', $dir . 'WilayahController');
  Route::resource('ug_access', $dir . 'UserGroupAccessController');
  Route::resource('ug_management', $dir . 'UserGroupManagement');
  Route::resource('settings', $dir . 'SettingsController');
  Route::resource('kredit', $dir . 'KreditController');
  Route::resource('debit', $dir . 'DebitController');

  // User management routes
  Route::resource('user_management', $dir . 'UserManagementController');
  Route::get(
    'user_management/create/{type}',
    [$dir . UserManagementController::class, 'create']
  )->name('user_management.create');
  Route::get(
    'user_management/{user_management}/edit/{comefrom?}',
    [$dir . UserManagementController::class, 'edit']
  )->name('user_management.edit')->middleware('checkOwner');
  Route::post(
    'user_management/email/{user_management}',
    [$dir . UserManagementController::class, 'email']
  )->name('user_management.email');
  // ---------------------------------------------------------------------


  // Subscription routes
  Route::resource('subscription', $dir . 'SubscriptionController');
  Route::get(
    'subscription/create/{cust_id?}',
    [$dir . SubscriptionController::class, 'create']
  )->name('subscription.create');
  Route::get(
    'subscription/{subs_id}/checkUnpaid',
    [$dir . SubscriptionController::class, 'checkUnpaid']
  )->name('subscription.checkUnpaid');
  Route::get(
    'subscription/{subs_id}/updown',
    [$dir . SubscriptionController::class, 'updown']
  )->name('subscription.updown');
  Route::post(
    'subscription/updown_store',
    [$dir . SubscriptionController::class, 'updown_store']
  )->name('subscription.updown_store');
  Route::post(
    'subscription/{subs_id}/putusSementara',
    [$dir . SubscriptionController::class, 'putusSementara']
  )->name('subscription.putusSementara');
  Route::post(
    'subscription/{subs_id}/putusPermanen',
    [$dir . SubscriptionController::class, 'putusPermanen']
  )->name('subscription.putusPermanen');
  Route::get(
    'subscription/{subs_id}/aktifkan',
    [$dir . SubscriptionController::class, 'aktifkan']
  )->name('subscription.aktifkan');
  Route::put(
    'subscription/{subs_id}/aktifkanUpdate',
    [$dir . SubscriptionController::class, 'aktifkanUpdate']
  )->name('subscription.aktifkanUpdate');
  Route::post(
    'subscription/{subs_id}/cancel',
    [$dir . SubscriptionController::class, 'cancel']
  )->name('subscription.cancel');
  // ---------------------------------------------------------------------


  // Invoice routes
  Route::get(
    'invoice/{inv_no}/payment',
    [$dir . InvoiceController::class, 'payment']
  )->name('invoice.payment');
  Route::get(
    'invoice/by_{berdasarkan}/payment_all',
    [$dir . InvoiceController::class, 'payment_all']
  )->name('invoice.payment_all');
  Route::get(
    'invoice/payment_all/get_invoices',
    [$dir . InvoiceController::class, 'get_invoices']
  )->name('invoice.get_invoices');
  Route::get(
    'invoice/payment_all/get_group',
    [$dir . InvoiceController::class, 'get_group']
  )->name('invoice.get_group');
  Route::get(
    'invoice/get_customers',
    [$dir . InvoiceController::class, 'get_customers']
  )->name('invoice.get_customers');
  Route::resource('invoice', $dir . 'InvoiceController');

  // ---------------------------------------------------------------------

  // Payment Routes
  Route::post(
    'daftar_pembayaran/store_all',
    [$dir . DaftarPembayaranController::class, 'store_all']
  )->name('daftar_pembayaran.store_all');
  Route::resource('daftar_pembayaran', $dir . 'DaftarPembayaranController');

  // PrintController Routes
  Route::get(
    'print/invoice/{inv_no}',
    [$dir . PrintController::class, 'invoice']
  )->name('print.invoice');
  Route::get(
    'print/kwitansi/{inv_no}',
    [$dir . PrintController::class, 'kwitansi']
  )->name('print.kwitansi');
  Route::get(
    'print/allkwitansi',
    [$dir . PrintController::class, 'allKwitansi']
  )->name('print.allKwitansi');
  Route::get(
    'print/kredit/{id}',
    [$dir . PrintController::class, 'kredit']
  )->name('print.kredit');
  Route::get(
    'print/debit/{id}',
    [$dir . PrintController::class, 'debit']
  )->name('print.debit');
  // ---------------------------------------------------------------------

  Route::resource('partner_group', $dir . 'PartnerGroupController');
  Route::get(
    'partner_group/edit/selectArea',
    [$dir . PartnerGroupController::class, 'selectArea']
  )->name('partner_group.selectArea');
  Route::group(['prefix' => 'partner_group/{group_id}'], function () {
    $dir = 'App\Http\Controllers\\';
    Route::resource('partner_user', $dir . 'PartnerUserController');
  });

  Route::resource('lo', $dir . 'LoGroupController');
  Route::get(
    'lo/edit/selectArea',
    [$dir . LoGroupController::class, 'selectArea']
  )->name('lo.selectArea');
  Route::group(['prefix' => 'lo_group/{group_id}'], function () {
    $dir = 'App\Http\Controllers\\';
    Route::resource('lo_user', $dir . 'LoUserController');
  });

  // Route Ajax in CustomerController
  Route::get(
    'daftarLangganan',
    [$dir . CustomerController::class, 'daftarLangganan']
  )->name('customer.daftarLangganan');
  Route::get(
    'find-wilayah',
    [$dir . CustomerController::class, 'wilayah']
  )->name('customer.wilayah');

  // Route Ajax in CustomerController
  Route::get(
    'daftarArea',
    [$dir . WilayahController::class, 'daftarArea']
  )->name('wilayah.daftarArea');

  // Untuk Detail Invoice
  Route::get(
    'invoice/{invoice}/detail',
    [$dir . InvoiceController::class, 'detail']
  )
    ->where('invoice', '[\w\s\-_\/]+')
    ->name('invoice.detail');
  // ---------------------------------------------------------------------

  // Untuk Laporan
  Route::get(
    'laporan',
    [LaporanController::class, 'index']
  )
    ->where('laporan', '[\w\s\-_\/]+')
    ->name('laporan.index');
  Route::post(
    'laporan/{laporan}/preview',
    [LaporanController::class, 'preview']
  )
    ->where('laporan', '[\w\s\-_\/]+')
    ->name('laporan.preview');

  Route::get('/exel', [LaporanController::class, 'exExcel']);
  Route::get('/exv', [LaporanController::class, 'exCSV']);
  // ----------------------------------------------------------------------

  Route::get(
    'dashboard/{dashboard}/change_password',
    [$dir . DashboardController::class, 'edit']
  )->where('dashboard', '[\w\s\-_\/]+');

  Route::put(
    'dashboard/{dashboard}',
    [$dir . DashboardController::class, 'update']
  )
    ->where('dashboard', '[\w\s\-_\/]+')
    ->name('dashboard.update');
  //------------------------------------------------------------------------


});
