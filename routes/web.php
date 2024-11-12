<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/task', [TaskController::class, 'store'])->name('store');

    Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
    Route::put('/task/{task}', [TaskController::class, 'update'])->name('update');
    Route::get('/finish-task/{task}', [TaskController::class, 'finishTask'])->name('finishTask');

    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
