<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::view('customer', 'customer.customer')->name('customer');
});

Route::middleware(['auth', 'verified', 'driver'])->group(function () {
    Route::view('driver', 'driver.driver')->name('driver');
});

Route::middleware(['auth', 'verified', 'dashboard'])->group(function () {
    Route::view('dashboard', 'owner.dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified', 'warehouse-manager'])->group(function () {
    Route::view('warehouse-manager', 'warehouse_manager.warehouse-manager')->name('warehouse-manager');
});

Route::middleware(['auth', 'verified', 'store-manager'])->group(function () {
    Route::view('storemanager', 'store_manager.storemanager')->name('store-manager');
});

Route::prefix('owner')->group(function () {

    Route::get('dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::get('product', [ProductController::class, 'product'])->name('product');
    Route::get('create', [ProductController::class, 'create'])->name('owner.create');
    


    Route::get('order', [ProductController::class, 'order'])->name('order');
    Route::get('customer_order', [ProductController::class, 'customer_order'])->name('customer_order');
    Route::get('purchase_order', [ProductController::class, 'purchase_order'])->name('purchase_order');
    Route::get('delivery', [ProductController::class, 'delivery'])->name('delivery');
    Route::get('inventory', [ProductController::class, 'inventory'])->name('inventory');
    Route::get('sales', [ProductController::class, 'sales'])->name('sales');
    Route::get('stocks', [ProductController::class, 'stocks'])->name('stocks');
    Route::get('reports', [ProductController::class, 'reports'])->name('reports');

});

require __DIR__.'/auth.php';
