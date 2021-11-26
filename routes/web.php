<?php

use App\Http\Controllers\EmergeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\PaternaireController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [GestionController::class,'index'])->name('presence.index');
    Route::get('profil', [ProfilController::class,'index'])->name('profil.view');
    Route::get('emargement',[EmergeController::class,'index'])->name('emerge.index');
    Route::post('emargement',[EmergeController::class,'create'])->name('emerge.index');
    Route::get('liste_emargement',[EmergeController::class,'presence'])->name('emerge.presence');
    Route::post('liste_emargement',[EmergeController::class,'presence1'])->name('emerge.presence');
    Route::get('apprenant_emargement',[EmergeController::class,'apprenant'])->name('emerge.presenc');
     // gestion des references
    Route::get('Referentiel',[ReferentielController::class,'index'])->name('reference.index');
    Route::get('Reference/create',[ReferentielController::class,'creat'])->name('reference.create');
    Route::post('Reference/create',[ReferentielController::class,'create'])->name('reference.create');
    Route::get('Reference/edit/{id}',[ReferentielController::class,'edit'])->name('reference.edit');
    Route::post('Reference/edit/{id}',[ReferentielController::class,'udapte'])->name('reference.edit');
    Route::get('Reference/delete/{id}',[ReferentielController::class,'delete'])->name('reference.delete');
        // gestion des partenaires
    Route::get('Partenaire',[PaternaireController::class,'index'])->name('paternaire.index');
    Route::get('Partenaire/create',[PaternaireController::class,'creat'])->name('paternaire.create');
    Route::post('Partenaire/create',[PaternaireController::class,'create'])->name('paternaire.create');
    Route::get('Partenaire/edit/{id}',[PaternaireController::class,'edit'])->name('paternaire.edit');
    Route::post('Partenaire/edit/{id}',[PaternaireController::class,'udapte'])->name('paternaire.edit');
    Route::get('Partenaire/delete/{id}',[PaternaireController::class,'delete'])->name('paternaire.delete');
    //gestion des formations
    Route::get('Formation',[FormationController::class,'index'])->name('formation.index');
    Route::get('Formation/create',[FormationController::class,'creat'])->name('formation.create');
    Route::post('Formation/create',[FormationController::class,'create'])->name('formation.create');
    Route::get('Formation/edit/{id}',[FormationController::class,'edit'])->name('formation.edit');
    Route::post('Formation/edit/{id}',[FormationController::class,'udapte'])->name('formation.edit');
    Route::get('Formation/delete/{id}',[FormationController::class,'delete'])->name('formation.delete');
    //gestion des apprenants
    Route::get('Apprenant',[UserController::class,'index'])->name('apprenant.index');
    Route::get('Apprenant/create',[UserController::class,'creat'])->name('apprenant.create');
    Route::post('Apprenant/create',[UserController::class,'create'])->name('apprenant.create');
    Route::get('Apprenant/edit/{id}',[UserController::class,'edit'])->name('apprenant.edit');
    Route::post('Apprenant/edit/{id}',[UserController::class,'udapte'])->name('apprenant.edit');
    Route::get('Apprenant/delete/{id}',[UserController::class,'delete'])->name('apprenant.delete');
});