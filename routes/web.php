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



require __DIR__.'/auth.php';
