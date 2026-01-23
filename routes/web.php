<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\reviewController;
use App\Http\Controllers\backend\HomeSliderController;
use App\Models\review;
use App\Models\HomeSlide;

Route::get('/', function () {
    $reviews = review::latest()->limit(5)->get();
    $homeslider = HomeSlide::find(1);
    return view('home.index', compact('reviews', 'homeslider'));
})->name('home');

Route::get('/home/reviews', function () {
    $reviews = review::latest()->get();
    $homeslider = HomeSlide::find(1);
    return view('home.pages.reviews', compact('reviews', 'homeslider'));
})->name('home.reviews');

Route::get('/about', function () {
    return view('home.pages.about');
})->name('home.about');

Route::get('/pricing', function () {
    return view('home.pages.pricing');
})->name('home.pricing');

Route::get('/portfolio', function () {
    return view('home.pages.portfolio');
})->name('home.portfolio');

Route::get('/blog', function () {
    return view('home.pages.blog');
})->name('home.blog');

Route::get('/contact', function () {
    return view('home.pages.contact');
})->name('home.contact');


Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'twofactor', 'verified'])->name('dashboard');

Route::middleware(['auth', 'twofactor'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Review All Route 
    Route::controller(reviewController::class)->group(function () {
        Route::get('/all/review', 'AllReview')->name('all.review');
        Route::get('/add/review', 'AddReview')->name('add.review');
        Route::post('/store/review', 'StoreReview')->name('store.review');
        Route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
        Route::post('/update/review', 'UpdateReview')->name('update.review');
        Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
    });

    // Home Slider Routes 
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slider', 'HomeSlider')->name('home.slider');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    });
});

require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('verify', [App\Http\Controllers\TwoFactorController::class, 'index'])->name('bs.verify.index');
    Route::post('verify', [App\Http\Controllers\TwoFactorController::class, 'store'])->name('bs.verify.store');
    Route::get('verify/resend', [App\Http\Controllers\TwoFactorController::class, 'resend'])->name('bs.verify.resend');
    Route::put('verify/update', [App\Http\Controllers\TwoFactorController::class, 'update'])->name('bs.verify.update');
});


Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
