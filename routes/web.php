<?php

use App\Http\Controllers\BudgetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'LoginPost'])->name('login');
    Route::get('forgot_password', function(){
        return view('forgot_password');
    })->name('forgot_password');
    Route::post('forgot_password_post', [AuthController::class, 'ForgotPasswordPost'])->name('forgot_password_email');
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
    Route::put('/purchase_order/{id}/confirm_delivery', [PurchaseOrderController::class, 'confirm_delivery'])->name('purchase_order.confirm_delivery');
    Route::resource('products', ProductController::class);
    Route::get('items', [ItemsController::class, 'index'])->name('items.index');
    // Items Issued
    Route::get('items.issued', [ItemsController::class, 'issued'])->name('items.issued');
    Route::get('items.issue_items', [ItemsController::class, 'issue_items'])->name('items.issue_items');
    Route::post('items.store_issued_items', [ItemsController::class, 'store_issued_items'])->name('items.store_issued_items');
    // Items Returned
    Route::get('items.returned', [ItemsController::class, 'returned'])->name('items.returned');
    Route::get('items.return_items', [ItemsController::class, 'return_items'])->name('items.return_items');
    Route::post('items.store_returned_items', [ItemsController::class, 'store_returned_items'])->name('items.store_returned_items');
});

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        // User Management as Admin
        route::resource('users', UsersContoller::class);
        route::resource('budgets', BudgetsController::class);
    });

