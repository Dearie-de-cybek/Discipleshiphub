<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JourneyMapController;
use App\Http\Controllers\DiscipleshipController;
use App\Http\Controllers\ResourceViewController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('home');  
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/curriculum', function () {
    return view('curriculum');
})->name('curriculum');

Route::get('/apply', function () {
    return view('apply');
})->name('apply');

Route::get('/resources', [ResourceViewController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('resources.view');

Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('discipleship')->name('discipleship.')->group(function () {
    Route::get('/journey-map', [JourneyMapController::class, 'index'])->name('journey-map');
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/lessons/{lesson}/complete', [LessonController::class, 'complete'])->name('lessons.complete');
    Route::get('/devotion', [DiscipleshipController::class, 'devotion'])->name('devotion');
    Route::post('/devotion/complete', [DiscipleshipController::class, 'completeDevot ion'])->name('devotion.complete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('resources', ResourceController::class);
});

require __DIR__.'/auth.php';
