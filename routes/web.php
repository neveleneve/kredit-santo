<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaBobotController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RumahController;
use Illuminate\Support\Facades\Auth;
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
    return redirect(route('login'));
})->name('landing-page');

Auth::routes([
    'register' => false
]);

Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::resource('nasabah', NasabahController::class);
Route::resource('rumah', RumahController::class)->except([
    'show'
]);
Route::resource('penilaian', PenilaianController::class);
Route::resource('kriteria-bobot', KriteriaBobotController::class);
