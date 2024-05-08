<?php

use App\Http\Controllers\AuthController;
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

Route::middleware(['auth', 'verified', 'owner'])->group(function () {
    Route::view('owner', 'owner.owner')->name('owner');
});

Route::middleware(['auth', 'verified', 'warehouse-manager'])->group(function () {
    Route::view('warehouse-manager', 'warehouse_manager.warehouse-manager')->name('warehouse-manager');
});

Route::middleware(['auth', 'verified', 'store-manager'])->group(function () {
    Route::view('storemanager', 'store_manager.storemanager')->name('store-manager');
});

Route::prefix('owner')->group(function () {

    Route::view('product', [ProductController::class, 'product'])->name('product');
    Route::view('order', [ProductController::class, 'order'])->name('order');
    Route::view('customer_order', [ProductController::class, 'customer_order'])->name('customer_order');
    Route::view('purchase_order', [ProductController::class, 'purchase_order'])->name('purchase_order');
    Route::view('delivery', [ProductController::class, 'delivery'])->name('delivery');
    Route::view('inventory', [ProductController::class, 'inventory'])->name('inventory');
    Route::view('sales', [ProductController::class, 'sales'])->name('sales');
    Route::view('stocks', [ProductController::class, 'stocks'])->name('stocks');
    Route::view('reports', [ProductController::class, 'reports'])->name('reports');

    // Route::get('not_participants', [HouseholdController::class, 'not_participants'])->name('not_participants');
    // Route::get('', [HouseholdController::class, 'index'])->name('mpo');
    // Route::get('create', [HouseholdController::class, 'create'])->name('mpo.create');
    // Route::post('store', [HouseholdController::class, 'store'])->name('mpo.store');
    // Route::get('show/{id}', [HouseholdController::class, 'show'])->name('mpo.show');
    // Route::get('edit/{id}', [HouseholdController::class, 'edit'])->name('mpo.edit');
    // Route::put('edit/{id}', [HouseholdController::class, 'update'])->name('mpo.update');
    // Route::get('/refer/{id}', [ReferralController::class, 'refer'])->name('mpo.refer');
    // Route::post('/refer/{id}', [ReferralController::class, 'refer'])->name('referral.refer');
    // Route::delete('destroy/{id}', [HouseholdController::class, 'destroy'])->name('mpo.destroy');
});

require __DIR__.'/auth.php';
