<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\KenderaanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemanduController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\MinyakController;

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('dashboard',[ DashboardController::class, 'index'])->name('dashboard');

Route::resource('kenderaan', KenderaanController::class);

Route::resource('pemandu', PemanduController::class);

Route::resource('servis', ServisController::class);

Route::resource('minyak', MinyakController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');


