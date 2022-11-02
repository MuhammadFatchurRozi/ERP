<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Bahan_BakuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BoMController;
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
Route::get('/', [LoginController::class, 'Login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

#Logout
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

#Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

#Bahan baku
Route::resource('bahan', Bahan_BakuController::class);

#Pesanan
Route::resource('pesanan', PesananController::class);

#Product
Route::resource('product', ProductController::class);

#BoM
Route::resource('bom', BomController::class);
Route::post('/bom/fetch', [BomController::class,'fetch'])->name('bom.fetch'); //Ajax Fetch Data nama produk from products
Route::post('/bom/fetch1', [BomController::class,'fetch1'])->name('bom.fetch1'); //Ajax Fetch Data ukuran from products
