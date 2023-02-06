<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/todo', function () {
    return Inertia::render('TodoApplication');
})->middleware(['auth', 'verified'])->name('todo');

Route::get('/savings', function () {
    return Inertia::render('TrackerSavings');
})->middleware(['auth', 'verified'])->name('savings');

Route::get('/watch', function () {
    return Inertia::render('StopWatch');
})->middleware(['auth', 'verified'])->name('watch');


require __DIR__.'/auth.php';
