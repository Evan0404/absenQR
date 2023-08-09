<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AdminAbsen;
use App\Livewire\AdminDashboar;
use App\Livewire\AdminRekap;
use App\Livewire\UserAbsen;
use App\Livewire\UserDashboar;

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

// Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function () {

// });
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboar', AdminDashboar::class );
    Route::get('/admin/absen', AdminDashboar::class );
    Route::get('/admin/rekap', AdminDashboar::class );
});
Auth::routes();

