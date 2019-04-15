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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('barang')->group(function(){
	Route::get('/all/', "BarangController@all")->name("semua_barang");
	Route::get("/add", "BarangController@add")->name("tambah_barang");
	Route::post("/save", "BarangController@save")->name("simpan_barang");
	Route::get("/edit/{id}", "BarangController@edit")->name("edit_barang");
	Route::post("/update/{id}", "BarangController@update")->name("update_barang");
	Route::get("/delete/{id}", "BarangController@delete")->name("hapus_barang");
});

Route::prefix('jenis')->group(function(){
	Route::get('/all/', "JenisController@all")->name("semua_jenis");
	Route::get("/add", "JenisController@add")->name("tambah_jenis");
	Route::post("/save", "JenisController@save")->name("simpan_jenis");
	Route::get("/edit/{id}", "JenisController@edit")->name("edit_jenis");
	Route::post("/update/{id}", "JenisController@update")->name("update_jenis");
	Route::get("/delete/{id}", "JenisController@delete")->name("hapus_jenis");
});

Route::prefix('penjualan')->group(function(){
	Route::get('/all', "PenjualanController@all")->name("semua_Penjualan");
	Route::get('/add', "PenjualanController@add")->name("tambah_Penjualan");
	Route::post("/save", "PenjualanController@save")->name("simpan_Penjualan");
	Route::get("/edit/{id}", "PenjualanController@edit")->name("edit_Penjualan");
	Route::post("/update/{id}", "PenjualanController@update")->name("update_Penjualan");
	Route::get("/delete/{id}", "PenjualanController@delete")->name("hapus_Penjualan");
});

Route::prefix('petugas')->group(function(){
	Route::get('/all', "PetugasController@all")->name("semua_Petugas");
	Route::get("/add", "PetugasController@add")->name("tambah_Petugas");
	Route::post("/save", "PetugasController@save")->name("simpan_Petugas");
	Route::get("/edit/{id}", "PetugasController@edit")->name("edit_Petugas");
	Route::post("/update/{id}", "PetugasController@update")->name("update_Petugas");
	Route::get("/delete/{id}", "PetugasController@delete")->name("hapus_Petugas");
});

Route::prefix('distributor')->group(function(){
	Route::get('/all', "DistributorController@all")->name("semua_Distributor");
	Route::get("/add", "DistributorController@add")->name("tambah_Distributor");
	Route::post("/save", "DistributorController@save")->name("simpan_Distributor");
	Route::get("/edit/{id}", "DistributorController@edit")->name("edit_Distributor");
	Route::post("/update/{id}", "DistributorController@update")->name("update_Distributor");
	Route::get("/delete/{id}", "DistributorController@delete")->name("hapus_Distributor");
});

Route::prefix('barangmasuk')->group(function(){
	Route::get('/all', "BarangMasukController@all")->name("semua_BarangMasuk");
	Route::get("/add", "BarangMasukController@add")->name("tambah_BarangMasuk");
	Route::post("/save", "BarangMasukController@save")->name("simpan_BarangMasuk");
	Route::get("/edit/{id}", "BarangMasukController@edit")->name("edit_BarangMasuk");
	Route::post("/update/{id}", "BarangMasukController@update")->name("update_BarangMasuk");
	Route::get("/delete/{id}", "BarangMasukController@delete")->name("hapus_BarangMasuk");
});

Route::prefix('detailbarangmasuk')->group(function(){
	Route::get('/all', "DetailBarangMasukController@all")->name("semua_detailbarangmasuk");
	Route::get("/add", "DetailBarangMasukController@add")->name("tambah_detailbarangmasuk");
	Route::post("/save", "DetailBarangMasukController@save")->name("simpan_detailbarangmasuk");
	Route::get("/edit/{id}", "DetailBarangMasukController@edit")->name("edit_detailbarangmasuk");
	Route::post("/update/{id}", "DetailBarangMasukController@update")->name("update_detailbarangmasuk");
	Route::get("/delete/{id}", "DetailBarangMasukController@delete")->name("hapus_detailbarangmasuk");
});

Route::prefix('detailpenjualan')->group(function(){
	Route::get('/all', "DetailPenjualanController@all")->name("semua_detailpenjualan");
	Route::get("/add", "DetailPenjualanController@add")->name("tambah_detailpenjualan");
	Route::post("/save", "DetailPenjualanController@save")->name("simpan_detailpenjualan");
	Route::get("/edit/{id}", "DetailPenjualanController@edit")->name("edit_detailpenjualan");
	Route::post("/update/{id}", "DetailPenjualanController@update")->name("update_detailpenjualan");
	Route::get("/delete/{id}", "DetailPenjualanController@delete")->name("hapus_detailpenjualan");
});

Route::get('/home', 'HomeController@index')->name('home');
