<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SilsilahController;
use App\Http\Controllers\TawasulController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\JadwalController;
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
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/detail/{id:slug}', [App\Http\Controllers\MainController::class, 'detail'])->name('main.detail');
Route::get('/page/{slug}', [App\Http\Controllers\MainController::class, 'pages'])->name('main.pages');
Route::get('/surah', [App\Http\Controllers\MainController::class, 'surah'])->name('main.surah');
Route::get('/yasin', [App\Http\Controllers\MainController::class, 'yasin'])->name('main.yasin');
Route::get('/ratib', [App\Http\Controllers\MainController::class, 'ratib'])->name('main.ratib');
Route::get('/profil', [App\Http\Controllers\MainController::class, 'profil'])->name('main.profil');
Route::get('/jadwal/sholat', [App\Http\Controllers\JadwalController::class, 'sholat'])->name('jadwal.sholat');
Route::get('/jadwal/imsakiyah', [App\Http\Controllers\JadwalController::class, 'imsakiyah'])->name('jadwal.imsakiyah');

Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pages', PageController::class);
Route::resource('categories', CategoryController::class);
Route::resource('silsilah', SilsilahController::class);
Route::resource('tawasul', TawasulController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('users', UserController::class);
Route::resource('settings', SettingController::class);
});