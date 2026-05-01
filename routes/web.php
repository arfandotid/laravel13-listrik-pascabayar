<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login');
});

// route auth
Route::get('/login', [\App\Http\Controllers\Pelanggan\Auth\LoginController::class, 'index'])->name('login')->middleware('guest:pelanggan');
Route::post('/login', [\App\Http\Controllers\Pelanggan\Auth\LoginController::class, 'store'])->name('login.store')->middleware('guest:pelanggan');
Route::post('/logout', [\App\Http\Controllers\Pelanggan\Auth\LoginController::class, 'logout'])->name('logout');

// dashboard
Route::group(['middleware' => ['auth:pelanggan']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Pelanggan\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pembayaran', [App\Http\Controllers\Pelanggan\PembayaranController::class, 'index'])->name('pembayaran.index');
});

// ADMIN ROUTES
Route::prefix('/admin')->name('admin.')->group(function () {
    // route auth
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'index'])->name('login')->middleware('guest:web');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'store'])->name('login.store')->middleware('guest:web');
    Route::post('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth:web']], function () {
        // route dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // route profile
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

        // route change password
        Route::get('/profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('profile.password.index');
        Route::put('/profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password.update');

        // route settings
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
        Route::delete('/settings/delete-logo', [App\Http\Controllers\Admin\SettingController::class, 'deleteLogo'])->name('settings.delete-logo');

        // route user management
        Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
        Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
        Route::resource('/users', App\Http\Controllers\Admin\UserController::class);

        // Buatkan CRUD Admin
        Route::resource('/tarif', App\Http\Controllers\Admin\TarifController::class);
        Route::resource('/pelanggan', App\Http\Controllers\Admin\PelangganController::class);
        Route::resource('/penggunaan', App\Http\Controllers\Admin\PenggunaanController::class);
        Route::resource('/tagihan', App\Http\Controllers\Admin\TagihanController::class);
        Route::resource('/pembayaran', App\Http\Controllers\Admin\PembayaranController::class);
    });
});
