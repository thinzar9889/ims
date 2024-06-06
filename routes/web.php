<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ReportController;
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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {

    // User
    Route::resource('users', UserController::class);
    Route::post('delete-user', [UserController::class, 'destroy'])->name('delete-user');

    // Role
    Route::resource('roles', RoleController::class);
    Route::post('delete-role', [RoleController::class, 'destroy'])->name('delete-role');

    // Company
    Route::resource('companies', CompanyController::class);
    Route::post('delete-company', [CompanyController::class, 'destroy'])->name('delete-company');

    // Intern
    Route::resource('interns', InternController::class);
    Route::post('delete-intern', [InternController::class, 'destroy'])->name('delete-intern');

    // Supervisor
    Route::resource('supervisors', SupervisorController::class);
    Route::post('delete-supervisor', [SupervisorController::class, 'destroy'])->name('delete-supervisor');

     // Report
     Route::resource('reports', ReportController::class);
     Route::post('delete-report', [ReportController::class, 'destroy'])->name('delete-report');
});
