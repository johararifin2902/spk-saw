<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\MatriksKeputusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


Route::get('/sub-kriteria/search', [SubKriteriaController::class, 'searchByName'])->name('sub_kriteria.searchByName');
Route::post('/sub-kriteria/search', [SubKriteriaController::class, 'searchResults'])->name('sub_kriteria.search.results');



// Halaman Utama (Welcome Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routing untuk Kriteria
Route::prefix('kriteria')->name('kriteria.')->middleware('auth')->group(function () {
    Route::get('/', [KriteriaController::class, 'index'])->name('index');
    Route::get('/create', [KriteriaController::class, 'create'])->name('create');
    Route::post('/store', [KriteriaController::class, 'store'])->name('store');
    Route::get('/edit/{kriteria}', [KriteriaController::class, 'edit'])->name('edit');
    Route::put('/update/{kriteria}', [KriteriaController::class, 'update'])->name('update');
    Route::delete('/destroy/{kriteria}', [KriteriaController::class, 'destroy'])->name('destroy');
    Route::put('/kriteria/update/{kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');

});

// Routing untuk Sub-Kriteria
Route::prefix('sub-kriteria')->name('sub_kriteria.')->middleware('auth')->group(function () {
    Route::get('/', [SubKriteriaController::class, 'index'])->name('index');
    Route::get('/create', [SubKriteriaController::class, 'create'])->name('create');
    Route::post('/store', [SubKriteriaController::class, 'store'])->name('store');
    Route::get('/edit/{subKriteria}', [SubKriteriaController::class, 'edit'])->name('edit');
    Route::put('/update/{subKriteria}', [SubKriteriaController::class, 'update'])->name('update');
    Route::delete('/destroy/{subKriteria}', [SubKriteriaController::class, 'destroy'])->name('destroy');
    Route::get('/sub-kriteria/{kriteria_id}', [SubKriteriaController::class, 'getSubKriterias'])->name('sub_kriteria.get');
    Route::put('/sub-kriteria/update/{subKriteria}', [SubKriteriaController::class, 'update'])->name('sub_kriteria.update');
    Route::get('/', [SubKriteriaController::class, 'index'])->name('index');
    Route::get('/edit/{subKriteria}', [SubKriteriaController::class, 'edit'])->name('edit');
    Route::put('/update/{subKriteria}', [SubKriteriaController::class, 'update'])->name('update');
});


// Routing untuk Alternatif
Route::prefix('alternatif')->name('alternatif.')->middleware('auth')->group(function () {
    Route::get('/', [AlternatifController::class, 'index'])->name('index');
    Route::get('/create', [AlternatifController::class, 'create'])->name('create');
    Route::post('/store', [AlternatifController::class, 'store'])->name('store');
    Route::get('/edit/{alternatif}', [AlternatifController::class, 'edit'])->name('edit');
    Route::put('/update/{alternatif}', [AlternatifController::class, 'update'])->name('update');
    Route::delete('/destroy/{alternatif}', [AlternatifController::class, 'destroy'])->name('destroy');
});


// Routing untuk Matriks Keputusan
Route::prefix('matriks')->name('matriks.')->middleware('auth')->group(function () {
    Route::get('/', [MatriksKeputusanController::class, 'index'])->name('index');
    Route::post('/store', [MatriksKeputusanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MatriksKeputusanController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [MatriksKeputusanController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [MatriksKeputusanController::class, 'destroy'])->name('destroy');
    Route::get('/normalisasi', [MatriksKeputusanController::class, 'normalisasi'])->name('normalisasi');
    Route::get('/matriks/ranking', [MatriksKeputusanController::class, 'ranking'])->name('matriks.ranking');

    Route::get('/ranking', [MatriksKeputusanController::class, 'ranking'])->name('ranking');
});


// Auth Routes (Login, Register, etc.)
require __DIR__ . '/auth.php';
