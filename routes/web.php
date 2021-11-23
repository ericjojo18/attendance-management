<?php

use App\Http\Controllers\EmergeController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\PaternaireController;
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
    Route::get('liste_emargement',[EmergeController::class,'presence'])->name('presence.index');
     // gestion des references
    Route::get('Referentiel',[ReferentielController::class,'index'])->name('reference.index');
    Route::get('Reference/create',[ReferentielController::class,'creat'])->name('reference.create');
    Route::post('Reference/create',[ReferentielController::class,'create'])->name('reference.create');
    Route::get('Reference/edit/{id}',[ReferentielController::class,'edit'])->name('reference.edit');
    Route::post('Reference/edit/{id}',[ReferentielController::class,'udapte'])->name('reference.edit');
    Route::get('Reference/delete/{id}',[ReferentielController::class,'delete'])->name('reference.delete');
        // gestion des partenaires
    Route::get('Partenaire',[PaternaireController::class,'index'])->name('paternaire.index');
    Route::get('Partenaire/create',[PaternaireControlle::class,'creat'])->name('paternaire.create');
    Route::post('Partenaire/create',[PaternaireControlle::class,'create'])->name('paternaire.create');
    Route::get('Partenaire/edit/{id}',[PaternaireControlle::class,'edit'])->name('reference.edit');
    Route::post('Partenaire/edit/{id}',[PaternaireControlle::class,'udapte'])->name('reference.edit');
    Route::get('Partenaire/delete/{id}',[PaternaireControlle::class,'delete'])->name('reference.delete');
});