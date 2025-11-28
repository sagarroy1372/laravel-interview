<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// ALL authenticated users
Route::middleware(['auth'])->group(function () {

    // User or Admin Dashboard redirect
    Route::get('/home', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return app(UserController::class)->index();
    })->name('home');

    // ADMIN ONLY ROUTES
    Route::middleware(['admin'])->group(function () {

        // Admin Dashboard
        Route::get('/admin', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        // List all users
        Route::get('/admin/users', [AdminController::class, 'users'])
            ->name('admin.users');

        // Admin → View user dashboard
        Route::get('/admin/user/{id}/dashboard', 
            [AdminController::class, 'viewUserDashboard'])
            ->name('admin.user.dashboard');

        // Categories CRUD
        Route::resource('categories', CategoryController::class);
    });
});
