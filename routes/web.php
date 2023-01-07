<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    RegisterController,
    HomeController,
    Bahan_BakuController,
    PesananController,
    ProductController,
    BoMController,
    KasirController,
    VendorController,
    MaDController,
    RfqController,
    POController,
    Confirm_OrderController,
    CostumerController,
    OrderController,
    QuotationController,
    AccountingController,
};

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
Route::get('bahan/kain', [HomeController::class, 'kain'])->name('home.kain');
Route::get('bahan/benang', [HomeController::class, 'benang'])->name('home.benang');


#Bahan baku
Route::resource('bahan', Bahan_BakuController::class);
// Route::get('datavendor/{id}/vendor', [Bahan_BakuController::class, 'vendor'])->name('bahan.vendor'); //Memesan Stok Dari vendor

#Pesanan
Route::resource('pesanan', PesananController::class);
Route::post('pesanan/{id}/mo', [PesananController::class, 'mo'])->name('pesanan.mo');  //MO (Material Order)
Route::post('pesanan/{id}/check_avability', [PesananController::class, 'check_avability'])->name('pesanan.ca');  //CA (Check Avabilty)
Route::post('pesanan/{id}/produce', [PesananController::class, 'produce'])->name('pesanan.produce'); //Produce
Route::post('pesanan/{id}/mad', [PesananController::class, 'mad'])->name('pesanan.mad'); //MAD (Material as Down)
Route::get('pesanan/{id}/cetak', [PesananController::class, 'cetak'])->name('pesanan.cetak');

#Product
Route::resource('product', ProductController::class);
Route::get('/product/{id}/stok', [ProductController::class, 'stok'])->name('product.stok'); //Add Stock
Route::put('/product/{id}/Add_stok', [ProductController::class, 'add_stok'])->name('product.add_stok'); //Add Stock

#Kasir
Route::resource('kasir', KasirController::class);
Route::post('/kasir/fetch3', [KasirController::class, 'fetch3'])->name('kasir.dependent2'); //Ajax Fetch Data nama produk from products
Route::post('/kasir/fetch', [KasirController::class, 'fetch'])->name('kasir.dependent'); //Ajax Fetch Data nama produk from products
Route::post('/kasir/fetch1', [KasirController::class, 'fetch1'])->name('kasir.fetch1'); //Ajax Fetch Data ukuran produk from products
Route::post('/kasir/fetch2', [KasirController::class, 'fetch2'])->name('kasir.fetch2'); //Ajax Fetch Data harga produk from products

#Vendor
Route::resource('datavendor', VendorController::class);

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

#Costumer
Route::resource('costumer', CostumerController::class);

#Order
Route::resource('order', OrderController::class);
Route::get('order/{id}/posted', [OrderController::class, 'posted'])->name('order.posted'); //Posted Order
Route::get('order/{id}/validate', [OrderController::class, 'validates'])->name('order.validate'); //validate Order
Route::get('order/{id}/delivery', [OrderController::class, 'delivery'])->name('order.delivery'); //Delivery Order

#Quotation
Route::resource('quotation', QuotationController::class);
Route::post('/quotation/costumer1', [QuotationController::class, 'costumer1'])->name('quotation.costumer1'); //Ajax Fetch Data phone cotumer from costumer
Route::post('/quotation/costumer2', [QuotationController::class, 'costumer2'])->name('quotation.costumer2'); //Ajax Fetch Data address sotumer from costumer
Route::post('/quotation/product1', [QuotationController::class, 'product1'])->name('quotation.product1'); //Ajax Fetch Data ukruan produk from products
Route::post('/quotation/product2', [QuotationController::class, 'product2'])->name('quotation.product2'); //Ajax Fetch Data harga produk from products
Route::post('/quotation/product3', [QuotationController::class, 'product3'])->name('quotation.product3'); //Ajax Fetch Data stok produk from products

#akunnting
Route::resource('accounting', AccountingController::class);
