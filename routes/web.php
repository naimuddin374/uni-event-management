<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SouvenirController;
use Illuminate\Support\Facades\DB;


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


// Authentication Routes
require __DIR__.'/auth.php';




// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    $routeArr = [
    'events' => EventController::class,
    'slides' => SlideController::class,
    'blogs' => BlogController::class,
    'members' => MemberController::class,
    'souvenirs' => SouvenirController::class,
];

    foreach($routeArr as $key => $controller) {
        Route::get('/admin/'.$key, [$controller, 'index'])->name('admin.'.$key.'.index');
        Route::get('/admin/'.$key.'/create', [$controller, 'create'])->name('admin.'.$key.'.create');
        Route::post('/admin/'.$key, [$controller, 'store'])->name('admin.'.$key.'.store');
        Route::get('/admin/'.$key.'/{'.$key.'}/edit', [$controller, 'edit'])->name('admin.'.$key.'.edit');
        Route::put('/admin/'.$key.'/{'.$key.'}', [$controller, 'update'])->name('admin.'.$key.'.update');
        Route::delete('/admin/'.$key.'/{'.$key.'}', [$controller, 'destroy'])->name('admin.'.$key.'.destroy');
    }
});

// You need to create and configure the AdminMiddleware as previously described
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events/{event}', [HomeController::class, 'eventDetail'])->name('events.detail');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{blog}', [HomeController::class, 'blogDetail'])->name('blogs.detail');
Route::get('/members', [HomeController::class, 'members'])->name('members');
Route::get('/souvenirs', [HomeController::class, 'souvenirs'])->name('souvenirs');
Route::get('/contact', function (){ return view('contact'); })->name('contact');
Route::get('/mission', function (){ return view('mission'); })->name('mission');
Route::get('/about', function (){ return view('about'); })->name('about');
Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Database connection is OK.';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});