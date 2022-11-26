<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Bahan_BakuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BoMController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MaDController;
use App\Http\Controllers\RfqController;
use App\Http\Controllers\POController;
use App\Http\Controllers\Confirm_OrderController;

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


#Login
// Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

#Logout
// Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

#Register
// Route::get('register', [RegisterController::class, 'register'])->name('register');
// Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

#Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard/kain', [HomeController::class, 'kain'])->name('home.kain');


#Bahan baku
Route::resource('bahan', Bahan_BakuController::class);
Route::get('datavendor/{id}/vendor', [Bahan_BakuController::class, 'vendor'])->name('bahan.vendor'); //Memesan Stok Dari vendor

#Pesanan
Route::resource('pesanan', PesananController::class);
Route::post('pesanan/{id}/proses', [PesananController::class, 'proses'])->name('pesanan.proses');  //Check Avibility (CA)
Route::get('pesanan/{id}/cetak', [PesananController::class, 'cetak'])->name('pesanan.cetak');

#Product
Route::resource('product', ProductController::class);

#Kasir
Route::resource('kasir', KasirController::class);
Route::post('/kasir/fetch3', [KasirController::class, 'fetch3'])->name('kasir.dependent2'); //Ajax Fetch Data nama produk from products
Route::post('/kasir/fetch', [KasirController::class, 'fetch'])->name('kasir.dependent'); //Ajax Fetch Data nama produk from products
Route::post('/kasir/fetch1', [KasirController::class, 'fetch1'])->name('kasir.fetch1'); //Ajax Fetch Data ukuran produk from products
Route::post('/kasir/fetch2', [KasirController::class, 'fetch2'])->name('kasir.fetch2'); //Ajax Fetch Data harga produk from products

#Vendor
Route::resource('datavendor', VendorController::class);
Route::get('/datavendor_search/action', [VendorController::class, 'action'])->name('datavendor.action');
#Confirm Order
Route::resource('confirm', Confirm_OrderController::class);
Route::get('/confirm/{id}/confirm/{kode_rfq}', [Confirm_OrderController::class, 'confirm'])->name('confirm.konfirmasi'); //Confirm Order

#BoM
Route::resource('bom', BomController::class);
Route::post('/bom/fetch', [BomController::class, 'fetch'])->name('bom.dependent'); //Ajax Fetch Data nama produk from products
Route::post('/bom/fetch1', [BomController::class, 'fetch1'])->name('bom.fetch1'); //Ajax Fetch Data ukuran from products
Route::get('/bom/{id}/cetak', [BomController::class, 'cetak'])->name('bom.cetak'); //Route Cetak PDF  

#MaD
Route::resource('mad', MadController::class);
Route::get('/mad/{id}/cetak', [MadController::class, 'cetak'])->name('mad.cetak');

#RFQ
Route::resource('rfq', RfqController::class);
Route::post('/rfq/fetch', [RfqController::class, 'fetch'])->name('rfq.dependent'); //Ajax Fetch Data nama produk from vendor
Route::post('/rfq/fetch1', [RfqController::class, 'fetch1'])->name('rfq.fetch1'); //Ajax Fetch Data harga produk from vendor
Route::post('/rfq/fetch2', [RfqController::class, 'fetch2'])->name('rfq.fetch2'); //Ajax Fetch Data nama vendor from vendor
Route::post('/rfq/fetch3', [RfqController::class, 'fetch3'])->name('rfq.fetch3'); //Ajax Fetch Data alamat vendor from vendor
Route::post('/rfq/fetch4', [RfqController::class, 'fetch4'])->name('rfq.fetch4'); //Ajax Fetch Data no_telp vendor from vendor
Route::get('rfq/{id}/cetak', [RfqController::class, 'cetak'])->name('rfq.cetak');

#PO
Route::resource('po', POController::class);
#Confirm Order
Route::get('po/{id}/receive', [POController::class, 'receive'])->name('po.receive'); //Receiver Product
Route::get('po/{id}/paid', [POController::class, 'paid'])->name('po.paid'); //Receiver Product
