<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get ('/', function () {
    return view('layouts.auth');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified', 'owner'])->group(function () {
        Route::view('owner', 'owner')->name('owner'); // Assuming 'owner' is the URI and 'owner.blade.php' is the view file
    });
    
// Route::middleware(['auth', 'verified', 'storemanager'])->group(function () {
//     Route::view('storemanager')->name('storemanager');
// });

// Route::middleware(['auth', 'verified', 'warehousemanager'])->group(function () {
//     Route::view('warehousemanager')->name('warehousemanager');
// });

// Route::middleware(['auth', 'verified', 'driver'])->group(function () {
//     Route::view('driver')->name('driver');
// });

// Route::middleware(['auth', 'verified', 'customer'])->group(function () {
//     Route::view('customer')->name('customer');
// });

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
