<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PokemonController::class, 'search'])->name('dashboard');
    Route::get('/pokemon/search', [PokemonController::class, 'search'])->name('pokemon.search');
    Route::get('/pokemon/random', [PokemonController::class, 'random'])->name('pokemon.random');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';