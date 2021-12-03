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


use App\Http\Controllers\ImportController;
use App\Http\Controllers\StudentsCtrl;
//Consultation des étudiants
Route::get('/students', [StudentsCtrl::class, 'students']);
Route::get('/import', [ImportController::class, 'importIndex' ]);
Route::post('/import', [ImportController::class, 'import' ]);

use App\Http\Controllers\ExceptionController;
// The route to show the possible students to add to the possible courses
Route::get('/addOrDeleteStudentFromCourse', [ExceptionController::class, 'showingStudentAndCourses']);
// The route to the page that ADDS a student to a course into the table "exception_student_list"
Route::post('/addOrDeleteStudentFromCourse/add', [ExceptionController::class, 'addStudentToCourse'])->name('add');
// The route to the page that DELETES a student from a course into the table "exception_student_list"
Route::post('/addOrDeleteStudentFromCourse/delete', [ExceptionController::class, 'DeleteStudentFromCourse'])->name('delete');

Route::get('/students/{seance_id}', [StudentsCtrl::class, 'students']);
Route::post('/students/{seance_id}/validation', [StudentsCtrl::class, 'save_presences']);

// Import des horaires
Route::get('/import', [ImportController::class, 'importIndex']);
Route::post('/import', [ImportController::class, 'import']);

Route::get('/addStudent', [StudentsCtrl::class, 'getIndex']);
Route::post('/addStudent', [StudentsCtrl::class, 'add']);

// The route to delete a student
Route::get('/students', [StudentsCtrl::class, 'getAll']);
Route::post('/students', [StudentsCtrl::class, 'delete']);
