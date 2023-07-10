<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guests\PageController as GuestsPageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestsPageController::class, 'home'])->name('guest.home');

Route::get('/admin', [AdminPageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth', 'verified')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminPageController::class, 'dashboard'])->name('dashboard');
        Route::get('/projects/trashed', [ProjectController::class, 'trashed'])->name('projects.trashed');
        Route::delete('/projects/{project}/harddelete', [ProjectController::class, 'harddelete'])->name('projects.harddelete');
        Route::post('/projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
        Route::resource('projects', ProjectController::class);
    });

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__ . '/auth.php';