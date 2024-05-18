<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseManagerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome')->middleware(['customer-dashboard']);

// To Delete
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
// To Delete

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
   
    Route::get('products', [ProductController::class, 'products'])->name('owner.products');


    Route::get('/', function () {
        return redirect()->route('owner.products');
    });

    Route::resource('products', ProductController::class);

    Route::get('products', [ProductController::class, 'products'])->name('owner.products');
    Route::get('create', [ProductController::class, 'create'])->name('owner.create');
    Route::post('products', [ProductController::class, 'store'])->name('owner.products.store');
    
    // Route::get('products/{product}', [ProductController::class, 'show'])->name('owner.products.show'); // Route for showing a specific product
    // Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('owner.products.edit'); // Route for showing the edit form for a specific product
    // Route::put('products/{product}', [ProductController::class, 'update'])->name('owner.products.update'); // Route for updating a specific product
    // Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('owner.products.destroy'); // Route for deleting a specific product

    Route::get('order', [ProductController::class, 'order'])->name('order');
    Route::get('customer_order', [ProductController::class, 'customer_order'])->name('customer_order');
    Route::get('purchase_order', [ProductController::class, 'purchase_order'])->name('purchase_order');
    Route::get('delivery', [ProductController::class, 'delivery'])->name('delivery');
    Route::get('inventory', [ProductController::class, 'inventory'])->name('inventory');
    Route::get('sales', [ProductController::class, 'sales'])->name('sales');
    Route::get('stocks', [ProductController::class, 'stocks'])->name('stocks');
    Route::get('reports', [ProductController::class, 'reports'])->name('reports');
    
    

});
Route::prefix('warehouse_manager')->group(function () {

    // Route::get('dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::get('generate-qr', [WarehouseManagerController::class, 'generateQR'])->name('generateQR');
    Route::get('qrScan', [WarehouseManagerController::class, 'qrScan'])->name('qrScan');
});

require __DIR__.'/auth.php';
