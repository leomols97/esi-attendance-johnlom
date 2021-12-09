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
Route::get('/import_groups_for_students', [GroupsCSVController::class, 'interface']);
Route::post('/import_groups_for_students', [GroupsCSVController::class, 'importCsv']);

//Téléchargement des statistiques de présence
use App\Http\Controllers\StatsExportController;
Route::get('/export_stats_presences', [StatsExportController::class, 'interface']);
Route::post('/export_stats_presences', [StatsExportController::class, 'export']);

//Consultation des étudiants
use App\Http\Controllers\StudentsCtrl;
Route::get('/take_presences/{seance_id}', [StudentsCtrl::class, 'students']);
Route::post('/take_presences/{seance_id}/validation', [StudentsCtrl::class, 'save_presences']);

// Import des horaires
use App\Http\Controllers\ImportController;
Route::get('/import_schedule', [ImportController::class, 'importIndex']);
Route::post('/import_schedule', [ImportController::class, 'import']);

use App\Http\Controllers\ExceptionController;
// The route to show the possible students to add to the possible courses
Route::get('/add_student_to_course', [ExceptionController::class, 'showingStudentToCourses']);
// The route to the page that adds a student to the course into the table "exception_student_list"
Route::post('/add_student_to_course/add', [ExceptionController::class, 'addStudentToCourse'])->name('add');

// Manage students
Route::get('/managing_students', [StudentsCtrl::class, 'getIndex']);
Route::post('/managing_students', [StudentsCtrl::class, 'add']);

// Route::get('/managing_students', [StudentsCtrl::class, 'getAll']);
// Route::post('/managing_students', [StudentsCtrl::class, 'delete']);