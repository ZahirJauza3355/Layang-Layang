<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| WEB ROUTE
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('welcome');
});


// ================= DASHBOARD DEFAULT =================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// ================= PROFILE =================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ================= ROLE SYSTEM =================

// ===== ADMIN =====
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/approve/{id}', [AdminController::class, 'approve'])->name('approve');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
});

// ===== JURI =====
Route::middleware(['auth', 'role:juri'])->prefix('juri')->name('juri.')->group(function () {
    Route::get('/dashboard', [JuriController::class, 'index'])->name('dashboard');
    Route::post('/nilai/{karya_id}', [JuriController::class, 'simpanNilai'])->name('nilai');
});

// ===== PESERTA =====
Route::middleware(['auth', 'role:peserta'])->prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/dashboard', [PesertaController::class, 'index'])->name('dashboard');
    Route::post('/upload', [PesertaController::class, 'upload'])->name('upload');
});

require __DIR__.'/auth.php';
