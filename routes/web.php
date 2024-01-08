<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterController;

use Illuminate\Support\Facades\Route;

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
    return view('login.index');
});

Route::resource('login', LoginController::class);
route::get('/logout', [LoginController::class, 'logout']);
route::middleware('login')->group(function () {
    route::get('/staff', [DashboardController::class, 'index'])->middleware('staff');

    Route::resource('/staff/user', UserController::class)->middleware('staff');
    Route::resource('/staff/klarifikasi', LetterTypeController::class)->middleware('staff');
    Route::resource('/staff/datasurat', LetterController::class)->middleware('staff');
    Route::get('/staff/export', [LetterTypeController::class, 'export'])->name('staff.export')->middleware('staff');


    route::get('/guru', [DashboardController::class, 'guru'])->middleware('guru');
});
