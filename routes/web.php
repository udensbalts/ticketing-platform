<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Public\EventController as PublicEventController;;
use App\Http\Controllers\EventRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth' ])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', AdminEventController::class);
});

Route::get('/events', [PublicEventController::class, 'index'])->name('public.events.index');
Route::get('/events/{event}', [PublicEventController::class, 'show'])->name('public.events.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/events/{event}/register', [EventRegistrationController::class, 'register'])->name('events.register');
    Route::post('/events/{event}/unregister', [EventRegistrationController::class, 'unregister'])->name('events.unregister');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my-events', [App\Http\Controllers\ProfileController::class, 'myEvents'])
        ->name('profile.my-events');
});




require __DIR__.'/auth.php';
