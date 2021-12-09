<?php

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
    return view('welcome');
});

//Fichier CSV pour l'affectation des groupes pour chaque étudiant
use App\Http\Controllers\GroupsCSVController;

Route::get('/importGroupsForStudents', [GroupsCSVController::class, 'interface']);
Route::post('/importGroupsForStudents', [GroupsCSVController::class, 'importCsv']);

//Téléchargement des statistiques de présence
use App\Http\Controllers\StatsExportController;

Route::get('/exportStats', [StatsExportController::class, 'interface']);
Route::post('/exportStats', [StatsExportController::class, 'export']);

//Consultation des étudiants pour une séance
use App\Http\Controllers\StudentsCtrl;

Route::get('/seance-details/{seance_id}', [StudentsCtrl::class, 'students']);
Route::post('/seance-details/{seance_id}', [StudentsCtrl::class, 'addException']);
Route::post('/seance-details/{seance_id}/validation', [StudentsCtrl::class, 'save_presences']);

//Ajouter un étudiant
Route::get('/addStudent', [StudentsCtrl::class, 'getIndex']);
Route::post('/addStudent', [StudentsCtrl::class, 'add']);

//Import des horaires
use App\Http\Controllers\ImportController;

Route::get('/import', [ImportController::class, 'importIndex']);
Route::post('/import', [ImportController::class, 'import']);

//Supprimer un étudiant
Route::get('/seance-delete-students', [StudentsCtrl::class, 'getAll']);
Route::post('/seance-delete-students/{student_id}', [StudentsCtrl::class, 'delete'])->name("seanceDeleteStudent");
