<?php

use App\Http\Controllers\EmergeController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\ProfilController;
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
});