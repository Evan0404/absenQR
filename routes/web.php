<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AdminAbsen;
use App\Livewire\AdminDashboar;
use App\Livewire\AdminRekap;
use App\Livewire\UserAbsen;
use App\Livewire\UserDashboar;
use App\Livewire\Akun;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboar', AdminDashboar::class );
    // Route::get('/admin/absen', AdminAbsen::class );
    Route::get('/admin/absen', [App\Http\Controllers\AdminAbsen::class, 'index'])->name('absen');
    Route::post('/admin/absen', [App\Http\Controllers\AdminAbsen::class, 'create'])->name('createAbsen');
    Route::get('/admin/absen/pulang', [App\Http\Controllers\AdminAbsen::class, 'indexpulang'])->name('absenpulang');
    Route::post('/admin/absen/pulang', [App\Http\Controllers\AdminAbsen::class, 'createpulang'])->name('createAbsenPulang');
    Route::get('/admin/rekap', AdminRekap::class );
    Route::get('/akun', Akun::class );
});

Route::get('/user/dashboar', UserDashboar::class);
Route::get('/user/profile', UserAbsen::class);
Auth::routes();

