<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
require('auth.php');
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
//Route::get("/admin/company/panel", [CompanyController::class, 'index'])->name("company_panel");
//Route::get('/admin/company/panel/new', [CompanyController::class, 'create'])->name('new-company');
//Route::post('/admin/company/panel/new/send', [CompanyController::class, 'store'])->name('store-company');
//Route::get('/admin/company/panel/{id}', [CompanyController::class, 'show'])->name('one-company');
//Route::get('admin/company/panel/edit/{id}', [CompanyController::class, 'edit'])->name('edit-company');
//Route::post('admin/company/panel/edit/store/{id}', [CompanyController::class, 'update'])->name('update-company');
//Route::get('/admin/company/panel/delete/{id}',[CompanyController::class,'delete'])->name('delete-company');


Route::prefix('/admin')->group(function () {
    Route::resource("/company/panel", CompanyController::class);
    Route::resource("/employee/panel", EmployeeController::class);
});
//Route::get("/admin/employee/panel", [EmployeeController::class, 'index'])->name("employee");
//Route::get("/admin/employee/panel", [EmployeeController::class, 'logo'])->name("employee");
//Route::get('/admin/employee/panel/new', [EmployeeController::class, 'create'])->name('new-employee');
//Route::post('/admin/employee/panel/new/send', [EmployeeController::class, 'store'])->name('store-employee');
//Route::get('/admin/employee/panel/{id}', [EmployeeController::class, 'show'])->name('one-employee');
//Route::get('admin/employee/panel/edit/{id}', [EmployeeController::class, 'edit'])->name('edit_employee');
//Route::post('admin/employee/panel/edit/store', [EmployeeController::class, 'update'])->name('update');
//Route::get('/admin/employee/panel/delete/{id}',[EmployeeController::class,'delete'])->name('delete-employee');
//
//

