<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EleveController;
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
    Route::get('/ecole/{id}/classes/{classe}/eleves', [EcoleController::class, 'eleves_by_classe'])->name('ecole.classe.eleve');
});
Route::get('/login/directeur', [DirecteurController::class, 'login_view']);
Route::post('/login/directeur', [DirecteurController::class, 'login'])->name('directeur.login');
Route::get('/directeur/dashboard', [EleveController::class, 'index'])->name('directeur.dashboard');
Route::get('/directeur/{id}/logout', [DirecteurController::class, 'logout'])->name('directeur.logout');
Route::get('/directeur/annee/', [DirecteurController::class, 'annee_scolaire'])->name('directeur.annee');
Route::get('/directeur/annee/{id}', [DirecteurController::class, 'choix_annee'])->name('directeur.choix');
Route::resource('directeur/eleves', EleveController::class);
Route::resource('directeur/classes', ClasseController::class);
Route::get('directeur/classe/{id}', [EleveController::class, 'eleves_by_classe'])->name("directeur.classe.eleve");
Route::get('/test', function(){
    return view('user');
})->name('user');
Route::post('user/recherche', [EleveController::class, 'recherche'])->name('user.search');
require __DIR__.'/auth.php';
