<?php

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DispatcherRedirectController;
use App\Http\Controllers\SupervisorMediaController;
use App\Http\Controllers\SupervisorRedirectController;
use App\Http\Controllers\SupervisorUsersController;
use App\Http\Controllers\SupervisorAmbulanceController;
use App\Http\Controllers\SupervisorLocationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::post('/login/custom', [CustomLoginController::class, 'login'])->name('login.custom');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/supervisor', [SupervisorRedirectController::class, 'index'])->name('supervisor.index');
    Route::get('/dispatcher', [DispatcherRedirectController::class, 'index'])->name('dispatcher.index');
    Route::resource('/supervisor/media', SupervisorMediaController::class);
    Route::resource('/supervisor/users', SupervisorUsersController::class);
    Route::resource('/supervisor/ambulance', SupervisorAmbulanceController::class);
    Route::resource('/supervisor/location', SupervisorLocationsController::class);
});


Route::middleware(['supervisor'])->group(function () {
    Route::get('/supervisor', [SupervisorRedirectController::class, 'index'])->name('supervisor.index');
});

Route::middleware(['dispatcher'])->group(function () {
    Route::get('/dispatcher', [DispatcherRedirectController::class, 'index'])->name('dispatcher.index');
});
