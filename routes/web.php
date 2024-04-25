<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Routes
// Route::get('/', [EventController::class, 'index'])->name('home');
// Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Authentication Routes
require __DIR__.'/auth.php';

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // EVENTS ROUTE
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');

    // SLIDES ROUTE
    Route::get('/admin/slides', [SlideController::class, 'index'])->name('admin.slides.index');
    Route::get('/admin/slides/create', [SlideController::class, 'create'])->name('admin.slides.create');
    Route::post('/admin/slides', [SlideController::class, 'store'])->name('admin.slides.store');
    Route::get('/admin/slides/{event}/edit', [SlideController::class, 'edit'])->name('admin.slides.edit');
    Route::put('/admin/slides/{event}', [SlideController::class, 'update'])->name('admin.slides.update');
    Route::delete('/admin/slides/{event}', [SlideController::class, 'destroy'])->name('admin.slides.destroy');
});

// You need to create and configure the AdminMiddleware as previously described
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events/{event}', [HomeController::class, 'detail'])->name('events.detail');
Route::get('/contact', function (){ return view('contact'); })->name('contact');
Route::get('/mission', function (){ return view('mission'); })->name('mission');
Route::get('/vision', function (){ return view('vision'); })->name('vision');
Route::get('/about', function (){ return view('about'); })->name('about');