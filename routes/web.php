<?php
  
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuruController;

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
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/siswas', function () {
    return view('siswas.index');
});
Route::get('/siswas', [App\Http\Controllers\SiswaController::class,'siswaSiswa']);
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
Route::get('/siswa', function () {
    return view('siswa.index');
});
Route::get('/guru', function () {
    return view('guru.index');
});
Route::resource('/siswa', SiswaController::class);
Route::resource('/guru', GuruController::class);  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:walkel'])->group(function () {
  
    Route::get('/walkel/home', [HomeController::class, 'walkelHome'])->name('walkel.home');
});
Route::get('/siswaw', function () {
    return view('siswaw.index');
});
Route::get('/siswaw', [App\Http\Controllers\SiswaController::class,'siswaWalkel']);

Route::get('/cetak',[SiswaController::class,'cetak']) -> name('siswap.cetak');

Route::get('/search', [SiswaController::class, 'cari'])->name('siswa.cari');
Route::get('/searchw', [SiswaController::class, 'cariw'])->name('siswaw.cari');
Route::get('/searchs', [SiswaController::class, 'caris'])->name('siswas.cari');
Route::get('/searchg', [GuruController::class, 'cari'])->name('guru.cari');