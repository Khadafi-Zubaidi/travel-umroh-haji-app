<?php

use App\Http\Controllers\AdminAppTuhController;
use App\Http\Controllers\ProdukTuhController;
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

Route::get('/', function () {
    return view('welcome');
});

//Admin App Tuh
Route::get('register_admin_app_tuh',[AdminAppTuhController::class,'register_admin_app_tuh'])->name('register_admin_app_tuh');
Route::post('simpan_data_admin_app_tuh_baru',[AdminAppTuhController::class,'simpan_data_admin_app_tuh_baru'])->name('simpan_data_admin_app_tuh_baru');
Route::get('login_admin_app_tuh',[AdminAppTuhController::class,'login_admin_app_tuh'])->middleware('AdminAppTuhLoggedIn');
Route::post('cek_login_admin_app_tuh',[AdminAppTuhController::class,'cek_login_admin_app_tuh'])->name('cek_login_admin_app_tuh');
Route::get('dashboard_admin_app_tuh',[AdminAppTuhController::class,'dashboard_admin_app_tuh'])->name('dashboard_admin_app_tuh');
Route::get('logout_admin_app_tuh',[AdminAppTuhController::class,'logout_admin_app_tuh'])->name('logout_admin_app_tuh');
Route::get('tampil_data_profil_admin_app_tuh_oleh_admin_app_tuh',[AdminAppTuhController::class,'tampil_data_profil_admin_app_tuh_oleh_admin_app_tuh'])->name('tampil_data_profil_admin_app_tuh_oleh_admin_app_tuh');
Route::post('simpan_perubahan_data_profil_admin_app_tuh',[AdminAppTuhController::class,'simpan_perubahan_data_profil_admin_app_tuh'])->name('simpan_perubahan_data_profil_admin_app_tuh');
Route::post('simpan_perubahan_data_password_admin_app_tuh',[AdminAppTuhController::class,'simpan_perubahan_data_password_admin_app_tuh'])->name('simpan_perubahan_data_password_admin_app_tuh');
Route::post('simpan_perubahan_data_foto_admin_app_tuh',[AdminAppTuhController::class,'simpan_perubahan_data_foto_admin_app_tuh'])->name('simpan_perubahan_data_foto_admin_app_tuh');

//Produk Tuh
Route::get('tampil_data_produk_tuh_oleh_admin_app_tuh',[ProdukTuhController::class,'tampil_data_produk_tuh_oleh_admin_app_tuh'])->name('tampil_data_produk_tuh_oleh_admin_app_tuh');
Route::get('/cari_id_produk_tuh/{id}',[ProdukTuhController::class,'cari_id_produk_tuh']);
Route::put('/simpan_perubahan_data_pokok_produk_tuh_oleh_admin_app_tuh',[ProdukTuhController::class,'simpan_perubahan_data_pokok_produk_tuh_oleh_admin_app_tuh'])->name('produk_tuh.simpan_perubahan_data_pokok');
Route::put('/hapus_data_produk_tuh_oleh_admin_app_tuh',[ProdukTuhController::class,'hapus_data_produk_tuh_oleh_admin_app_tuh'])->name('produk_tuh.hapus_data');
Route::post('/simpan_perubahan_data_foto_produk_tuh_oleh_admin_app_tuh',[ProdukTuhController::class,'simpan_perubahan_data_foto_produk_tuh_oleh_admin_app_tuh'])->name('produk_tuh.simpan_perubahan_foto');
Route::get('tambah_data_produk_tuh_oleh_admin_app_tuh',[ProdukTuhController::class,'tambah_data_produk_tuh_oleh_admin_app_tuh'])->name('tambah_data_produk_tuh_oleh_admin_app_tuh');
Route::post('simpan_data_produk_tuh_baru_oleh_admin_app_tuh',[ProdukTuhController::class,'simpan_data_produk_tuh_baru_oleh_admin_app_tuh'])->name('simpan_data_produk_tuh_baru_oleh_admin_app_tuh');









