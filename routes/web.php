<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\PatientController;

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

Route::get('/', [UserController::class, "get_login_view"]);
Route::post('/Acceuil', [UserController::class, "login"])->name('connexion');

Route::get('/Medecins', [MedecinController::class, 'get_medecins_view'])->name('listes_medecins');
Route::post('/Medecins', [MedecinController::class, 'update_medecin'])->name('update_medecin');
Route::post('/Medecins/User', [MedecinController::class, 'desactiver_medecin'])->name('desactiver_medecin');

Route::get('/Medecins/CreateMedecin', [MedecinController::class,'create_medecin_view'])
->name('medecin_create');
Route::post('/Medecins/CreateMedecin', [MedecinController::class,'create_medecin'])->name('insert_medecin');

Route::get('/Secretaires', [SecretaireController::class, 'get_secretaires'])->name('secretaires');
Route::get('/Secretaires/CreateSecretaire', [SecretaireController::class,'get_create_secretaire_view'])->name('secretaire_profile');
Route::post('/Secretaires/CreateSecretaire', [SecretaireController::class,'create_secretaire'])->name('insert_secretaire');

Route::get('/Patients', [PatientController::class, 'get_patients'])->name('patients');
Route::get('/Patients/Create', [PatientController::class, 'get_patient_create_view'])->name('patient_create');
Route::post('/Patients/Create', [PatientController::class, 'patient_create_submit'])->name('patient_create_submit');
Route::post('/Patients/Update', [PatientController::class, 'update_patient_view'])->name('get_update_patient_view');
Route::post('/Patients/Update/Submit', [PatientController::class, 'update_patient'])->name('update_patient');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
