<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsCtrl;


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

//Consultation des étudiants
Route::get('/students/{seance_id}', [StudentsCtrl::class, 'students']);
