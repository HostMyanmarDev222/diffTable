<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login\EmployeeController;

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

// Auth::routes();

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {
        Route::get('home', [Home\EmployeeHomeController::class,'index'])->name('home');

    Route::get('login', [EmployeeController::class,'showLoginForm'])->name('login');
    Route::post('login', [EmployeeController::class,'login'])->name('login');
    Route::get('logout', [EmployeeController::class,'logout'])->name('logout');
      });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
