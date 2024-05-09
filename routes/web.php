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


Route::middleware(['auth', 'verified', 'customer-dashboard'])->group(function () {
    Route::view('customer-dashboard', 'customer.customer-dashboard')->name('customer-dashboard');
});

Route::middleware(['auth', 'verified', 'driver-dashboard'])->group(function () {
    Route::view('driver-dashboard', 'driver.driver-dashboard')->name('driver-dashboard');
});

Route::middleware(['auth', 'verified', 'owner-dashboard'])->group(function () {
    Route::view('owner-dashboard', 'owner.owner-dashboard')->name('owner-dashboard');
});

Route::middleware(['auth', 'verified', 'warehouse-manager-dashboard'])->group(function () {
    Route::view('warehouse-manager-dashboard', 'warehouse_manager.warehouse-manager-dashboard')->name('warehouse-manager-dashboard');
});

Route::middleware(['auth', 'verified', 'store-manager-dashboard'])->group(function () {
    Route::view('store-manager-dashboard', 'store_manager.store-manager-dashboard')->name('store-manager-dashboard');
});







Route::prefix('owner')->group(function () {

    // Route::get('dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
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
