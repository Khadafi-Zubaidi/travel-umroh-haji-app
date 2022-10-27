<?php

use App\Http\Controllers\AdminAppTuhController;
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
