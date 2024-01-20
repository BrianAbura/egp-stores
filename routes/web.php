<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'LoginPost'])->name('login');
    Route::get('forgot-password', function(){
        return view('forgot_password');
    })->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'ForgotPasswordPost'])->name('password.email');
    Route::get('/reset-password/{token}', function(string $token){
        return view('reset_password', ['token' => $token]);
    })->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'ResetPasswordPost'])->name('password.update');
});

Route::middleware('auth')->group(function(){
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('supplier', SupplierController::class);
    Route::resource('purchase_order', PurchaseOrderController::class);
});
