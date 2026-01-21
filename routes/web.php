<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'twofactor', 'verified'])->name('dashboard');

Route::middleware(['auth', 'twofactor'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});

require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('verify', [App\Http\Controllers\TwoFactorController::class, 'index'])->name('bs.verify.index');
    Route::post('verify', [App\Http\Controllers\TwoFactorController::class, 'store'])->name('bs.verify.store');
    Route::get('verify/resend', [App\Http\Controllers\TwoFactorController::class, 'resend'])->name('bs.verify.resend');
    Route::put('verify/update', [App\Http\Controllers\TwoFactorController::class, 'update'])->name('bs.verify.update');
});


Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
