<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VideoController;
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
    Route::resource("/companies", CompanyController::class);
    Route::resource("/employee", EmployeeController::class);
    Route::resource("/video", VideoController::class);
});
