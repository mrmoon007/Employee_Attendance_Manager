<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Employee\LoginController;
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

// Route::get('/', function () {
//     // to_route('employee.login');
//     redirect()->route('employee.login');
// });


Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm']);
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('employee/authenticate', [LoginController::class, 'authenticate'])->name('employee.authenticate');
Route::get('employee/logout', [LoginController::class, 'logout'])->name('employee.logout');


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('dashboard/', [DashboardController::class, 'index'])->name('dashboard');
});


Route::prefix('employee')->name('employee.')->middleware(['auth:employee'])->group(function () {
    Route::get('/', [EmployeeDashboardController::class, 'index'])->name('dashboard');
});