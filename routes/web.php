<?php

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
Route::prefix('admin')->group(function () {
    Route::get("company/panel", [CompanyController::class, 'index'])->name("company_panel");
    Route::get('company/panel/new', [CompanyController::class, 'create'])->name('new-company');
    Route::post('company/panel/new/send', [CompanyController::class, 'store'])->name('store-company');
    Route::get('company/panel/new/send{id}', [CompanyController::class, 'show'])->name('show-company');
    Route::get('admin/company/panel/edit/{id}', [CompanyController::class, 'edit'])->name('edit-company');
    Route::post('admin/company/panel/edit/store', [CompanyController::class, 'update'])->name('update-company');
    Route::get('/admin/company/panel/delete/{id}',[CompanyController::class,'destroy'])->name('delete-company');

    Route::resource("/employee-panel", EmployeeController::class);
});