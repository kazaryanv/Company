<?php

use App\Http\Controllers\AuthController;
//use Illuminate\Support\Facades\Route;

Route::get("/", [AuthController::class, 'index'])->name("welcome");
Route::get("/login", [AuthController::class, 'index'])->name("login");
Route::post("/login/store", [AuthController::class, 'login'])->name("login-view");
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get("/admin", function(){
    return view('admin.dashboard');
})->middleware("auth")->name('dashboard');
