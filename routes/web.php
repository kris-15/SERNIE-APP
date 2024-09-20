<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
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
    Route::resource('directeurs', DirecteurController::class);
    Route::resource('ecoles', EcoleController::class);
    Route::resource('annees', AnneeScolaireController::class);
    Route::resource('sections', SectionController::class);
});
Route::get('/login/directeur', [DirecteurController::class, 'login_view']);
Route::post('/login/directeur', [DirecteurController::class, 'login'])->name('directeur.login');
Route::get('/directeur/dashboard', [DirecteurController::class, 'dashboard'])->name('directeur.dashboard');
Route::get('/directeur/{id}/logout', [DirecteurController::class, 'logout'])->name('directeur.logout');
Route::get('/directeur/annee/', [DirecteurController::class, 'annee_scolaire'])->name('directeur.annee  ');
Route::get('/directeur/annee/{id}', [DirecteurController::class, 'choix_annee'])->name('directeur.choix');

require __DIR__.'/auth.php';
