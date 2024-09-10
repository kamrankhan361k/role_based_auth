<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// Routes for authenticated users (any role)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Routes for Seller
Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::get('/seller', function () {
        return 'Welcome, Seller!';
    });
});

// Routes for Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Welcome, Admin!';
    });
});

// Routes for Super Admin
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/super-admin', function () {
        return 'Welcome, Super Admin!';
    });
});

// Unauthorized Route
Route::get('/unauthorized', function () {
    return "You are not authorized to access this page.";
});