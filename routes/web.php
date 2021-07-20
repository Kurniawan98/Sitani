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
Auth::routes();
Route::get('/','user\WelcomeController@index')->name('home');
Route::get('/home','user\WelcomeController@index')->name('home2');
Route::get('/kontak','user\WelcomeController@kontak')->name('kontak');
Route::get('/produk','user\ProdukController@index')->name('user.produk');
Route::get('/produk/create','user\ProdukController@form')->name('user.produk.create');
Route::post('/produk/store','user\ProdukController@store')->name('user.produk.store');
Route::get('/produk/cari','user\ProdukController@cari')->name('user.produk.cari');
Route::get('/kategori/{id}','KategoriController@produkByKategori')->name('user.kategori');
Route::get('/produk/{id}','user\ProdukController@detail')->name('user.produk.detail');

Route::get('/pelanggan',function(){
    return 'Pelanggan';
});

Route::group(['middleware' => ['auth','checkRole:petani']],function(){    
    Route::get('/pengaturan/alamat','petani\PengaturanController@aturalamat')->name('petani.pengaturan.alamat');
    Route::get('/pengaturan/ubahalamat/{id}','petani\PengaturanController@ubahalamat')->name('petani.pengaturan.ubahalamat');
    Route::get('/pengaturan/alamat/getcity/{id}','petani\PengaturanController@getCity')->name('petani.pengaturan.getCity');
    Route::post('pengaturan/simpanalamat','petani\PengaturanController@simpanalamat')->name('petani.pengaturan.simpanalamat');
    Route::post('pengaturan/updatealamat/{id}','petani\PengaturanController@updatealamat')->name('petani.pengaturan.updatealamat');
    


    Route::get('/petani','user\WelcomeController@index')->name('petani.welcome');
    Route::get('/petani/categories','petani\CategoriesController@index')->name('petani.categories');
    Route::get('/petani/categories/tambah','petani\CategoriesController@tambah')->name('petani.categories.tambah');
    Route::post('/petani/categories/store','petani\CategoriesController@store')->name('petani.categories.store');
    Route::post('/petani/categories/update/{id}','petani\CategoriesController@update')->name('petani.categories.update');
    Route::get('/petani/categories/edit/{id}','petani\CategoriesController@edit')->name('petani.categories.edit');
    Route::get('/petani/categories/delete/{id}','petani\CategoriesController@delete')->name('petani.categories.delete');

    Route::get('/petani/product','petani\ProductController@index')->name('petani.product');
    Route::get('/petani/product/tambah','petani\ProductController@tambah')->name('petani.product.tambah');
    Route::post('/petani/product/store','petani\ProductController@store')->name('petani.product.store');
    Route::get('/petani/product/edit/{id}','petani\ProductController@edit')->name('petani.product.edit');
    Route::get('/petani/product/delete/{id}','petani\ProductController@delete')->name('petani.product.delete');
    Route::post('/petani/product/update/{id}','petani\ProductController@update')->name('petani.product.update');

    Route::get('/petani/transaksi','petani\TransaksiController@index')->name('petani.transaksi');
    Route::get('/petani/transaksi/perludicek','petani\TransaksiController@perludicek')->name('petani.transaksi.perludicek');
    Route::get('/petani/transaksi/perludikirim','petani\TransaksiController@perludikirim')->name('petani.transaksi.perludikirim');
    Route::get('/petani/transaksi/dikirim','petani\TransaksiController@dikirim')->name('petani.transaksi.dikirim');
    Route::get('/petani/transaksi/detail/{id}','petani\TransaksiController@detail')->name('petani.transaksi.detail');
    Route::get('/petani/transaksi/konfirmasi/{id}','petani\TransaksiController@konfirmasi')->name('petani.transaksi.konfirmasi');
    Route::post('/petani/transaksi/inputresi/{id}','petani\TransaksiController@inputresi')->name('petani.transaksi.inputresi');
    Route::get('/petani/transaksi/selesai','petani\TransaksiController@selesai')->name('petani.transaksi.selesai');
    Route::get('/petani/transaksi/dibatalkan','petani\TransaksiController@dibatalkan')->name('petani.transaksi.dibatalkan');

    // Route::get('/petani/rekening','petani\RekeningController@index')->name('petani.rekening');
    // Route::get('/petani/rekening/edit/{id}','petani\RekeningController@edit')->name('petani.rekening.edit');
    // Route::get('/petani/rekening/tambah','petani\RekeningController@tambah')->name('petani.rekening.tambah');
    // Route::post('/petani/rekening/store','petani\RekeningController@store')->name('petani.rekening.store');
    // Route::get('/petani/rekening/delete/{id}','petani\RekeningController@delete')->name('petani.rekening.delete');
    // Route::post('/petani/rekening/update/{id}','petani\RekeningController@update')->name('petani.rekening.update');

    Route::get('/petani/pelanggan','petani\PelangganController@index')->name('petani.pelanggan');
});

Route::group(['middleware' => ['auth','checkRole:admin']],function(){    
    Route::get('/admin','DashboardController@index')->name('admin.dashboard');
    Route::get('/pengaturan/alamat','admin\PengaturanController@aturalamat')->name('admin.pengaturan.alamat');
    Route::get('/pengaturan/ubahalamat/{id}','admin\PengaturanController@ubahalamat')->name('admin.pengaturan.ubahalamat');
    Route::get('/pengaturan/alamat/getcity/{id}','admin\PengaturanController@getCity')->name('admin.pengaturan.getCity');
    Route::post('pengaturan/simpanalamat','admin\PengaturanController@simpanalamat')->name('admin.pengaturan.simpanalamat');
    Route::post('pengaturan/updatealamat/{id}','admin\PengaturanController@updatealamat')->name('admin.pengaturan.updatealamat');

    Route::get('/admin/categories','admin\CategoriesController@index')->name('admin.categories');
    Route::get('/admin/categories/tambah','admin\CategoriesController@tambah')->name('admin.categories.tambah');
    Route::post('/admin/categories/store','admin\CategoriesController@store')->name('admin.categories.store');
    Route::post('/admin/categories/update/{id}','admin\CategoriesController@update')->name('admin.categories.update');
    Route::get('/admin/categories/edit/{id}','admin\CategoriesController@edit')->name('admin.categories.edit');
    Route::get('/admin/categories/delete/{id}','admin\CategoriesController@delete')->name('admin.categories.delete');
    
    Route::get('/admin/kategoriharga','KategoriHargaPanganController@index')->name('admin.kategoriharga');
    Route::get('/admin/kategoriharga/tambah','KategoriHargaPanganController@tambah')->name('admin.kategoriharga.tambah');
    Route::post('/admin/kategoriharga/store','KategoriHargaPanganController@store')->name('admin.kategoriharga.store');
    Route::post('/admin/kategoriharga/update{id}','KategoriHargaPanganController@update')->name('admin.kategoriharga.update');
    Route::get('/admin/kategoriharga/edit{id}','KategoriHargaPanganController@edit')->name('admin.kategoriharga.edit');
    Route::get('/admin/kategoriharga/delete{id}','KategoriHargaPanganController@delete')->name('admin.kategoriharga.delete');
    

    Route::get('/admin/datakategoriharga','admin\HargaPanganController@index')->name('admin.datakategoriharga');
    Route::get('/admin/datakategoriharga/tambah','admin\HargaPanganController@tambah')->name('admin.datakategoriharga.tambah');
    Route::post('/admin/datakategoriharga/store','admin\HargaPanganController@store')->name('admin.datakategoriharga.store');
    Route::post('/admin/datakategoriharga/update{id}','admin\HargaPanganController@update')->name('admin.datakategoriharga.update');
    Route::get('/admin/datakategoriharga/edit{id}','admin\HargaPanganController@edit')->name('admin.datakategoriharga.edit');
    Route::get('/admin/datakategoriharga/delete{id}','admin\HargaPanganController@delete')->name('admin.datakategoriharga.delete');

    Route::get('/admin/berita','admin\BeritaController@index')->name('admin.berita');
    Route::get('/admin/berita/tambah','admin\BeritaController@tambah')->name('admin.berita.tambah');
    Route::post('/admin/berita/store','admin\BeritaController@store')->name('admin.berita.store');
    Route::post('/admin/berita/update{id}','admin\BeritaController@update')->name('admin.berita.update');
    Route::post('/admin/berita/edit{id}','admin\BeritaController@edit')->name('admin.berita.edit');
    Route::post('/admin/berita/delete{id}','admin\BeritaController@delete')->name('admin.berita.delete');


    Route::get('/admin/product','admin\ProductController@index')->name('admin.product');
    Route::get('/admin/product/tambah','admin\ProductController@tambah')->name('admin.product.tambah');
    Route::post('/admin/product/store','admin\ProductController@store')->name('admin.product.store');
    Route::get('/admin/product/edit/{id}','admin\ProductController@edit')->name('admin.product.edit');
    Route::get('/admin/product/delete/{id}','admin\ProductController@delete')->name('admin.product.delete');
    Route::post('/admin/product/update/{id}','admin\ProductController@update')->name('admin.product.update');

    // Route::get('/admin/transaksi','admin\TransaksiController@index')->name('admin.transaksi');
    // Route::get('/admin/transaksi/perludicek','admin\TransaksiController@perludicek')->name('admin.transaksi.perludicek');
    // Route::get('/admin/transaksi/perludikirim','admin\TransaksiController@perludikirim')->name('admin.transaksi.perludikirim');
    // Route::get('/admin/transaksi/dikirim','admin\TransaksiController@dikirim')->name('admin.transaksi.dikirim');
    // Route::get('/admin/transaksi/detail/{id}','admin\TransaksiController@detail')->name('admin.transaksi.detail');
    // Route::get('/admin/transaksi/konfirmasi/{id}','admin\TransaksiController@konfirmasi')->name('admin.transaksi.konfirmasi');
    // Route::post('/admin/transaksi/inputresi/{id}','admin\TransaksiController@inputresi')->name('admin.transaksi.inputresi');
    // Route::get('/admin/transaksi/selesai','admin\TransaksiController@selesai')->name('admin.transaksi.selesai');
    // Route::get('/admin/transaksi/dibatalkan','admin\TransaksiController@dibatalkan')->name('admin.transaksi.dibatalkan');

    // Route::get('/admin/rekening','admin\RekeningController@index')->name('admin.rekening');
    // Route::get('/admin/rekening/edit/{id}','admin\RekeningController@edit')->name('admin.rekening.edit');
    // Route::get('/admin/rekening/tambah','admin\RekeningController@tambah')->name('admin.rekening.tambah');
    // Route::post('/admin/rekening/store','admin\RekeningController@store')->name('admin.rekening.store');
    // Route::get('/admin/rekening/delete/{id}','admin\RekeningController@delete')->name('admin.rekening.delete');
    // Route::post('/admin/rekening/update/{id}','admin\RekeningController@update')->name('admin.rekening.update');

    Route::get('/admin/pelanggan','admin\PelangganController@index')->name('admin.pelanggan');
    Route::get('/admin/berita','admin\BeritaController@index')->name('admin.berita');
    Route::get('/admin/hargapangan','admin\HargaPanganController@index')->name('admin.hargapangan');
    Route::post('/admin/hargapangan/upload_harga_pangan','admin\HargaPanganController@import');



});

Route::group(['middleware' => ['auth','checkRole:tengkulak']],function(){\

    Route::get('/tengkulak','user\WelcomeController@index')->name('tengkulak.welcome');
    Route::post('/keranjang/simpan','user\KeranjangController@simpan')->name('user.keranjang.simpan');
    Route::get('/keranjang','user\KeranjangController@index')->name('user.keranjang');
    Route::post('/keranjang/update','user\KeranjangController@update')->name('user.keranjang.update');
    Route::get('/keranjang/delete/{id}','user\KeranjangController@delete')->name('user.keranjang.delete');
    Route::get('/alamat','user\AlamatController@index')->name('user.alamat');
    Route::get('/getcity/{id}','user\AlamatController@getCity')->name('user.alamat.getCity');
    Route::post('/alamat/simpan','user\AlamatController@simpan')->name('user.alamat.simpan');
    Route::post('/alamat/update/{id}','user\AlamatController@update')->name('user.alamat.update');
    Route::get('/alamat/ubah/{id}','user\AlamatController@ubah')->name('user.alamat.ubah');
    Route::get('/checkout','user\CheckoutController@index')->name('user.checkout');
    Route::post('/order/simpan','user\OrderController@simpan')->name('user.order.simpan');
    Route::get('/order/sukses','user\OrderController@sukses')->name('user.order.sukses');
    Route::get('/order','user\OrderController@index')->name('user.order');
    Route::get('/order/detail/{id}','user\OrderController@detail')->name('user.order.detail');
    Route::get('/order/pesananditerima/{id}','user\OrderController@pesananditerima')->name('user.order.pesananditerima');
    Route::get('/order/pesanandibatalkan/{id}','user\OrderController@pesanandibatalkan')->name('user.order.pesanandibatalkan');
    Route::get('/order/pembayaran/{id}','user\OrderController@pembayaran')->name('user.order.pembayaran');
    Route::post('/order/kirimbukti/{id}','user\OrderController@kirimbukti')->name('user.order.kirimbukti');
});

Route::get('/ongkir', 'OngkirController@index');
Route::get('/ongkir/province/{id}/cities', 'OngkirController@getCities');
// Route::get('/submit', 'OngkirController@submit')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
