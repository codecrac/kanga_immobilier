<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontController;
use \App\Http\Controllers\AdminController;
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

Route::get('/redirection/{langue}', [FrontController::class, 'redirection'] )->name("redirection");

Route::get('/', [FrontController::class, 'home'] )->name("home");

Route::get('/a-propos', [FrontController::class, 'about'] )->name("about");

Route::get('/contactez-nous',  [FrontController::class, 'contact'] )->name("contact");
Route::post('/demmande-rdv',  [FrontController::class, 'demmande_rdv'] )->name("demmande_rdv");
Route::post('/recherche-cibler',  [FrontController::class, 'recherche_cibler'] )->name("recherche_cibler");
Route::get('/resultat_recherche_cibler',  [FrontController::class, 'resultat_recherche_cibler'] )->name("resultat_recherche_cibler");

Route::get('/proprietes/{type}',  [FrontController::class, 'properties'] )->name("properties");

Route::get('/property-details/{id_propriete}', [FrontController::class, 'property_details'] )->name("property-details");

//-------------------------------//-------------------------------//-------------------------------//-------------------------------
//-------------------------------//-------------------------------//-------------------------------//-------------------------------

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',  [AdminController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/categories', [AdminController::class, 'categories'])->name('dashboard.categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/editer-categorie-proprietes/{id_categorie}', [AdminController::class, 'editer_categorie_proprietes'])->name('editer_categorie_proprietes');

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/enregistrer-categorie-proprietes', [AdminController::class, 'enregistrer_categorie_proprietes'])->name('enregistrer_categorie_proprietes');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/modifier-categorie-proprietes', [AdminController::class, 'modifier_categorie_proprietes'])->name('modifier_categorie_proprietes');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/supprimer-categorie-proprietes/{id}', [AdminController::class, 'supprimer_categorie_proprietes'])->name('supprimer_categorie_proprietes');
//-------------------------------//-------------------------------//-------------------------------//-------------------------------
//-------------------------------//-------------------------------//-------------------------------//-------------------------------

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/proprietes',  [AdminController::class, 'proprietes'])->name('dashboard.proprietes');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/editer-proprietes/{id_propriete}',  [AdminController::class, 'editer_proprietes'])->name('editer_proprietes');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/modifier-proprietes',  [AdminController::class, 'modifier_proprietes'])->name('modifier_proprietes');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/effacer-photo-de-la-galerie/{id_propriete}',  [AdminController::class, 'effacer_une_photo_de_la_galerie'])->name('effacer_photo_de_la_galerie');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/enregistrer-proprietes',  [AdminController::class, 'enregistrer_proprietes'])->name('enregistrer_proprietes');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/supprimer-proprietes',  [AdminController::class, 'supprimer_proprietes'])->name('supprimer_proprietes');

//-------------------------------//-------------------------------//-------------------------------//-------------------------------
//-------------------------------//-------------------------------//-------------------------------//-------------------------------
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/rdv', [AdminController::class, 'rdv'])->name('dashboard.rdv');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/changer_statut_rdv/{id_rdv}/{statut}', [AdminController::class, 'changer_statut_rdv'])->name('changer_statut_rdv');
