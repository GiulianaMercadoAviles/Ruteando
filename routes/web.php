<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\RoadWorkController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MaintenanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/accesoDenegado', function () {
    return view('accesoDenegado');
});

require __DIR__.'/auth.php';

Route::controller(MachineController::class)->prefix('machines')->group(function () {
    Route::get('/read', 'index')->name('machines');
    Route::get('/create', 'create')->name('machines.create');
    Route::post('/store', 'store')->name('machines.store');
    Route::get('/show/{id}', 'show')->name('machines.show');
    Route::get('/{id}/edit', 'edit')->name('machines.edit');
    Route::put('/update/{id}', 'update')->name('machines.update');
    Route::get('/destroy/{id}', 'destroy')->name('machines.destroy');
    Route::get('/search', 'search')->name('machines.search');
    Route::get('/history/{id}', 'history')->name('history');
});

Route::controller(MaintenanceController::class)->prefix('maintenances')->group(function () {
    Route::get('/read', 'index')->name('maintenances');
    Route::get('/create', 'create')->name('maintenances.create');
    Route::post('/store', 'store')->name('maintenances.store');
    Route::get('/{id}/edit', 'edit')->name('maintenances.edit');
    Route::put('/update/{id}', 'update')->name('maintenances.update');
    Route::get('/destroy/{id}', 'destroy')->name('maintenances.destroy');
    Route::get('/search', 'search')->name('maintenances.search');
}); 


Route::controller(RoadWorkController::class)->prefix('roadWorks')->group(function () {
    Route::get('/read', 'index')->name('roadWorks');
    Route::get('/create', 'create')->name('roadWorks.create');
    Route::post('/store', 'store')->name('roadWorks.store');
    Route::get('/show/{id}', 'show')->name('roadWorks.show');
    Route::get('/{id}/edit', 'edit')->name('roadWorks.edit');
    Route::put('/update/{id}', 'update')->name('roadWorks.update');
    Route::get('/{id}/delete', 'delete')->name('roadWorks.delete');
    Route::post('/destroy/{id}', 'destroy')->name('roadWorks.destroy');   
    Route::get('/search', 'search')->name('roadWorks.search');
});

Route::controller(AssignmentController::class)->prefix('assignments')->group(function () {
    Route::get('/read', 'index')->name('assignments');
    Route::get('/create', 'create')->name('assignments.create');
    Route::post('/store', 'store')->name('assignments.store');
    Route::get('/{id}/edit', 'edit')->name('assignments.edit');
    Route::put('/update/{id}', 'update')->name('assignments.update');
    Route::get('/{id}/delete', 'delete')->name('assignments.delete');
    Route::post('/destroy/{id}', 'destroy')->name('assignments.destroy');
    Route::get('/search', 'search')->name('assignments.search');
    Route::post('/history', 'history')->name('assignments.history');
});


