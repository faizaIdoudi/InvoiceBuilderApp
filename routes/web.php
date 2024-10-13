<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\FactureController;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    Route::get('/team',[TeamController::class, 'index'])->name('team.index');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('team.delete');
    Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');  



    Route::get('/client',[ClientController::class, 'index'])->name('client.index');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/client/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/facture',[FactureController::class, 'index'])->name('facture.index');
    Route::get('/facture/create', [FactureController::class, 'create'])->name('facture.create');
    Route::post('/facture', [FactureController::class, 'store'])->name('facture.store');
    Route::get('/facture/{id}/edit', [FactureController::class, 'edit'])->name('facture.edit');
    Route::put('/facture/{id}', [FactureController::class, 'update'])->name('facture.update');
    Route::delete('/facture/{id}', [FactureController::class, 'destroy'])->name('facture.destroy');
    Route::get('/facture/{id}', [FactureController::class, 'show'])->name('facture.show');


});

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
*/