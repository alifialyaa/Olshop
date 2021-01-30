<?php

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
//     return view('index');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/', 'PagesController@home');

// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@home');
Route::resource('/index', 'CategoriesController');
// Route::resource('/pemilik', 'PemiliksController');
// Route::resource('/karyawan', 'KaryawansController');
Route::get('/masuk', 'PagesController@masuk')->name('login');
Route::get('/register', 'PagesController@daftar');
Route::get('/logout', 'PagesController@logout');
// Route::get('/detil_kategori', 'CategoriesController@show');
Route::get('/tambah_kategori', 'PagesController@tkategori');
Route::get('/pemilik', 'PagesController@pemilik');

Route::get('/hapus_kategori', 'PagesController@hapusKategori');
Route::get('/tambah_produk', 'PagesController@tproduk');
Route::get('/detil_produk', 'PagesController@detil')->name('kategoriDetil');

Route::get('/keranjang', 'CartsController@index')->name('carts.index');
Route::post('/keranjang', 'CartsController@store')->name('carts.store');
Route::delete('/keranjang/{produk}/{idProduk}', 'CartsController@destroy')->name('carts.destroy');
Route::post('/keranjang/diskon', 'CartsController@tambahDiskon')->name('carts.tambahDiskon');
Route::post('/keranjang/diskon/hapus', 'CartsController@hapusDiskon')->name('carts.hapusDiskon');

// Route::get('/checkout', 'CheckoutsController@index')->name('checkouts.index');

Route::get('/checkout', 'CheckoutsController@index')->name('checkouts.index');
Route::post('/checkout_product', 'CheckoutsController@submit')->name('checkouts.ongkir');
Route::post('/checkout_product/{ongkos}', 'CheckoutsController@ongkir')->name('checkouts.transaksi');
Route::post('/pesanan', 'CheckoutsController@bayar');
// Route::get('/pesanan', 'CheckoutsController@tampil');
Route::get('/pesanan_status', 'CheckoutsController@tampil')->name('checkouts.status');
Route::get('/province/{id}/cities', 'CheckoutsController@getCities');
Route::post('/index', 'RetursController@store');
Route::get('/pengembalian/create', 'RetursController@create');
Route::get('/pembelian', 'TransaksisController@index');


Route::get('empty', function(){
    Cart::destroy();
});

// Route::group(['prefix' => 'karyawan', 'middleware'=>'auth'], function(){
//     Route::get('/login', 'AuthKaryawan\LoginController@showLoginForm')->name('karyawans.login');
//     Route::post('/login', 'AuthKaryawan\LoginController@login')->name('karyawans.login.submit');
//     Route::get('/', 'KaryawansController@index')->name('karyawans.index');
// });

Route::group(['prefix' => 'karyawan'], function(){
    Route::get('/login', 'AuthKaryawan\LoginController@showLoginForm')->name('karyawans.login');
    Route::post('/login', 'AuthKaryawan\LoginController@login')->name('karyawans.login.submit');
    Route::get('/', 'KaryawansController@index')->name('karyawans.index');

    Route::get('/create_category', 'KaryawansController@create')->name('karyawans.create');
    Route::get('/products/{category}', 'ProductsController@index')->middleware('auth:karyawan')->name('ProductsController');
    Route::get('/produk/{category}/create_product', 'ProductsController@create')->middleware('auth:karyawan')->name('pemiliks.Products.create');
    Route::get('/produk/{produk}', 'ProductsController@show')->middleware('auth:karyawan')->name('karyawans.Products.show');
    Route::get('/produk/{produk}/edit', 'ProductsController@edit')->middleware('auth:karyawan')->name('karyawans.Products.show');
    Route::post('/kinerja', 'KinerjasController@store')->middleware('auth:karyawan')->name('karyawans.kinerjas.store');
    Route::get('/kinerja/{id}', 'KinerjasController@index')->middleware('auth:karyawan')->name('karyawans.kinerjas.index');
    Route::get('/kinerja/{id}/create_kinerja', 'KinerjasController@create')->middleware('auth:karyawan')->name('karyawans.kinerjas.create');
    Route::get('/retur', 'RetursController@index')->middleware('auth:karyawan')->name('karyawans.returs.index');
    Route::post('/laporan_pengeluaran', 'LaporankeluarsController@store')->middleware('auth:karyawan')->name('laporans.keluars.store');
    Route::get('/laporan_pengeluaran/create', 'LaporankeluarsController@create')->middleware('auth:karyawan')->name('laporans.keluars.create');
    Route::get('/transaksi', 'TransaksisController@indexKaryawan')->middleware('auth:karyawan')->name('transaksis.karywans.index');
    // Route::get('/kinerja', 'PagesController@kinerja')->name('karyawans.kinerjas.index');
});

// Route::middleware(['auth'])->group(['prefix' => 'karyawan'], function(){
//     Route::get('/login', 'AuthKaryawan\LoginController@showLoginForm')->name('karyawans.login');
//     Route::post('/login', 'AuthKaryawan\LoginController@login')->name('karyawans.login.submit');
//     Route::get('/', 'KaryawansController@index')->name('karyawans.index');
// });

Route::group(['prefix' => 'pemilik'], function(){
    Route::get('/masuk', 'AuthPemilik\LoginController@showLoginForm')->name('pemiliks.login');
    Route::post('/masuk', 'AuthPemilik\LoginController@login')->name('pemiliks.login.submit');
    Route::get('/', 'PemiliksController@index')->name('pemiliks.index');
    Route::get('/create_category', 'PemiliksController@create')->name('pemiliks.create');
    Route::get('/{category}/edit_category', 'PemiliksController@edit')->name('pemiliks.edit');
    Route::get('/produk_list/{category}', 'ProductsController@index')->middleware('auth:pemilik')->name('pemiliks.Products.index');
    Route::get('/{category}/create_product', 'ProductsController@create')->middleware('auth:pemilik')->name('pemiliks.Products.create');
    Route::get('/produk/{produk}', 'ProductsController@show')->middleware('auth:pemilik')->name('pemiliks.Products.show');
    Route::get('/produk/{produk}/edit', 'ProductsController@edit')->middleware('auth:pemilik')->name('pemiliks.Products.edit');
    Route::post('/kinerja', 'KinerjasController@filter')->middleware('auth:pemilik')->name('laporans.masuks.index');
    Route::get('/kinerja', 'KinerjasController@indexPemilik')->middleware('auth:pemilik')->name('pemiliks.kinerjas.index');
    // Route::get('/{category}', 'ProductsController@index')->middleware('auth:pemilik')->name('ProductsController');
    Route::post('/promo', 'PromosController@store')->name('Pemiliks.promos.store');
    Route::get('/promo', 'PromosController@index')->name('Pemiliks.promos.index');
    Route::get('/promo/buat_promo', 'PromosController@create')->name('Pemiliks.promos.create');
    Route::post('/laporan_pengeluaran', 'LaporankeluarsController@filter')->middleware('auth:pemilik')->name('laporans.keluars.index');
    Route::get('/laporan_pengeluaran', 'LaporankeluarsController@index')->middleware('auth:pemilik')->name('laporans.keluars.index');
    Route::post('/laporan_pemasukan', 'LaporanmasuksController@filter')->middleware('auth:pemilik')->name('laporans.masuks.index');
    Route::get('/laporan_pemasukan', 'LaporanmasuksController@index')->middleware('auth:pemilik')->name('laporans.masuks.index');
    // Route::get('/coba', 'PagesController@nyoba')->middleware('auth:pemilik')->name('pemiliks.promos.index');

});

// Route::post('/pemilik/promo', 'PromosController@index')->name('pemiliks.promos.index');

// coba 1
// Route::group(['prefix' => 'karyawan'], function(){
//     Route::get('/masuk', 'AuthKaryawan\LoginController@showLoginForm')->name('karyawans.login');
//     Route::post('/masuk', 'AuthKaryawan\LoginController@login')->name('karyawans.login.submit');
//     Route::get('/', 'KaryawansController@index')->name('karyawans.index');
// });
// Route::resource('/karyawan', 'KaryawansController');

Route::resource('produk', 'ProductsController');
Route::resource('kinerja', 'KinerjasController');
Route::resource('ulasan', 'UlasansController');
// Route::resource('promo', 'PromosController');


// untuk passing dari category ke product
Route::get('/products/{category}', 'ProductsController@index')->name('ProductsController');
Route::get('produk/{id}/tambah', 'ProductsController@create');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
